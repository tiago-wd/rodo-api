<?php

namespace App\Models\Traits\Attribute;

use Storage;

/**
 * Trait UserAttribute.
 */
trait UserAttribute
{
    public function getAvatarUrlAttribute()
    {
        return Storage::url('avatars/'.$this->id.'/'.$this->avatar);
    }
}