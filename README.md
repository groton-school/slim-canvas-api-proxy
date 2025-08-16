# groton-school/slim-canvas-api-proxy

Server-side actions and routes for authenticating to and accessing the Canvas LMS API from a web client

[![Latest Version](https://img.shields.io/packagist/v/groton-school/slim-canvas-api-proxy.svg)](https://packagist.org/packages/groton-school/slim-canvas-api-proxy)

## Install

```bash
composer require groton-school/slim-canvas-api-proxy
```

## Use

This is an implementation of [groton-school/slim-oauth2-api-proxy](https://github.com/groton-school/slim-oauth2-api-proxy#readme). This provides a server-side proxy to the Canvas LMS API for a web app (which would not normally be able to directly call an API hosted on another domain due to CORS restrictions). The canonical example of how to use this is [groton-school/slim-skeleton's gae/lti-tool_canvas-api-proxy branch](https://github.com/groton-school/slim-skeleton/tree/gae/lti-tool_canvas-api-proxy#readme).
