<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class MailLog extends Model
{
    public $timestamps = false;

    protected $table = 'grr_log_mail';

    /** @var list<string> */
    protected $fillable = [
        'sent_at',
        'from',
        'to',
        'subject',
        'message',
    ];
}
