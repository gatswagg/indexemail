const http = require('http');
const url = require('url');
const {screenshot} = require("./lib/screenshot");
const {readFile} = require("./lib/read-file");

const handler = (req, res) => {
    res.setHeader('Access-Control-Allow-Origin', '*');
    const parsedUrl = url.parse(req.url, true);

    switch (parsedUrl.pathname) {
        case '/':
            res.writeHead(200, {'Content-type':'text/plain'});
            return res.end('Hello, I am a webserver !');
        case '/screenshot':
            const website = parsedUrl.query.website;
            if(!website) {
                throw new Error('Please provide a website');
            }
            screenshot(website, err => {
                if (err) {
                    throw err;
                }
                return readFile('bg.jpeg', res);
            });
            break;
        default:
            res.writeHead(404, {'Content-type':'text/plain'});
            return res.end('Page not found');
    }
}

const server = http.createServer(handler);
server.listen(3000);