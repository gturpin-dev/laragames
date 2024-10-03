<?php

declare(strict_types=1);

namespace App\Enums\Metadata;

use ArchTech\Enums\Meta\MetaProperty;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Label extends MetaProperty {}
