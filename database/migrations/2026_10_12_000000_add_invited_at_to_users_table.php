<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Users are invited by email and set their own password (Filament Storybook: actions-invite-a-user): until they do,
     * the password is empty and `invited_at` says when the latest invitation was sent.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->nullable()->change();
            $table->timestamp('invited_at')->nullable()->after('email_verified_at');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('invited_at');
            $table->string('password')->nullable(false)->change();
        });
    }
};
