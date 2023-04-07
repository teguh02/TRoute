<?php

namespace Teguh02\TRoute;

use Teguh02\TRoute\Route\Route as MainRoute;
use Teguh02\TRoute\Route\MatchRoute as MatchRoute;

class Route {
    use MatchRoute;
    use MainRoute;
}