<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Customer
 *
 * @property-read \App\Pref $pref
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer query()
 */
	class Customer extends \Eloquent {}
}

namespace App{
/**
 * App\Pref
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pref newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pref newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pref query()
 */
	class Pref extends \Eloquent {}
}

