FROM node:9.11.1

LABEL description="Create the mock node web server mimics the http server \
Using this server instead of the real one is safe to test our http dynamic website."
LABEL authors="Yosra Harbaoui, Iando Rafidimalala"
LABEL version="1.0"

COPY src/ /opt/app



ENTRYPOINT [ "node", "/opt/app/index.js"]