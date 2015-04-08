<?

namespace McKay;

class HttpStatus {
    const OK = 200;
    const CREATED = 201;
    const ACCEPTED = 202;
    const NON_AUTHORITATIVE_INFORMATION = 203;
    const NO_CONTENT = 204;
    const RESET_CONTENT = 205;
    const PARTIAL_CONTENT = 206;
    const MULTIPLE_CHOICES = 300;
    const MOVED_PERMANENTLY = 301;
    const MOVED_TEMPORARILY = 302;
    const SEE_OTHER = 303;
    const NOT_MODIFIED = 304;
    const USE_PROXY = 305;
    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const PAYMENT_REQUIRED = 402;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const METHOD_NOT_ALLOWED = 405;
    const NOT_ACCEPTABLE = 406;
    const PROXY_AUTHENTICATION_REQUIRED = 407;
    const REQUEST_TIMEOUT = 408;
    const CONFLICT = 409;
    const GONE = 410;
    const LENGTH_REQUIRED = 411;
    const PRECONDITION_FAILED = 412;
    const REQUEST_ENTITY_TOO_LARGE = 413;
    const REQUEST_URI_TOO_LARGE = 414;
    const UNSUPPORTED_MEDIA_TYPE = 415;
    const INTERNAL_SERVER_ERROR = 500;
    const NOT_IMPLEMENTED = 501;
    const BAD_GATEWAY = 502;
    const SERVICE_UNAVAILABLE = 503;
    const GATEWAY_TIMEOUT = 504;
    const HTTP_VERSION_NOT_SUPPORTED = 505;

    public static function set($code) {
        http_response_code($code);
    }

    public static function get() {
        return http_response_code();
    }

    public static function text($code = null) {
        static $texts = null;
        if ($texts === null) {
            $texts = array_map(function($text) {
                $text = ucwords(strtolower(str_replace('_', ' ', $text)));
                $text = str_replace('Non Authoritative', 'Non-Authoritative', $text);
                $text = str_replace('Request Uri', 'Request-Uri', $text);
                $text = str_replace('Uri', 'URI', $text);
                return $text;
            }, array_flip((new \ReflectionClass('McKay\\HttpStatus'))->getConstants()));
        }

        if ($code === null) {
            $code = self::get();
        }

        if (in_array($code, array_keys($texts))) {
            return $texts[$code];
        } else {
            return 'Custom';
        }
    }
}

?>
