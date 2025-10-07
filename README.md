# groton-school/slim-canvas-api-proxy

Server-side actions and routes for authenticating to and accessing the Canvas LMS API from a web client

[![Latest Version](https://img.shields.io/packagist/v/groton-school/slim-canvas-api-proxy.svg)](https://packagist.org/packages/groton-school/slim-canvas-api-proxy)

## Install

```bash
composer require groton-school/slim-canvas-api-proxy
```

## Use

This is an implementation of [groton-school/slim-oauth2-api-proxy](https://github.com/groton-school/slim-oauth2-api-proxy#readme). This provides a server-side proxy to the Canvas LMS API for a web app (which would not normally be able to directly call an API hosted on another domain due to CORS restrictions). The canonical example of how to use this is [groton-school/slim-skeleton's gae/lti-tool_canvas-api-proxy branch](https://github.com/groton-school/slim-skeleton/tree/gae/lti-tool_canvas-api-proxy#readme).

One significant caution, however, is that the LTI is _not_ portable across all three Canvas instances (Production, Beta, Test) without thoughtful configuration. The logic of this is clear: Test or Beta have no way of knowing that Production issued a valid API token to this user. Moreover, Test and Beta may well have older, less complete, or differently updated data than Production, causing 404 errors (at best).

One approach to this is to leverage the `HTTP_ORIGIN` header, although doing this while also dancing the third-party cookie dance to get sessions set up is a little tricky. An example of this can be found in the [Planner LTI](https://github.com/groton-school/planner-lti/blob/889f0cd0cdd083fb5f029617c8e2cf5d21f085ea/app/dependencies.php#L68-L87). In this case, _when the `HTTP_ORIGIN` header is available_ but also _while we are in the LTI launch-initiated PHP session_ we store the provided `HTTP_ORIGIN` in the session for future use when it will _not_ be provided (e.g. by a JavaScript call to the API Proxy.)

Of particular note is [the closing line of the definition](https://github.com/groton-school/planner-lti/blob/889f0cd0cdd083fb5f029617c8e2cf5d21f085ea/app/dependencies.php#L85) which _closes_ the session that was manually opened, potentially so that [groton-school/slim-lti-partititoned-session](https://github.com/groton-school/slim-lti-partitioned-session#readme) can reopen it as part of the middleware stack.
