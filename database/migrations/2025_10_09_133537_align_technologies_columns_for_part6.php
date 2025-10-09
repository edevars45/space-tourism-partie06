<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('technologies', function (Blueprint $table) {
            // Renommer is_active -> is_published si besoin
            if (Schema::hasColumn('technologies', 'is_active') && !Schema::hasColumn('technologies', 'is_published')) {
                $table->renameColumn('is_active', 'is_published');
            }

            // Renommer position -> order si besoin
            if (Schema::hasColumn('technologies', 'position') && !Schema::hasColumn('technologies', 'order')) {
                $table->renameColumn('position', 'order');
            }

            // Ajouter website_url si absent
            if (!Schema::hasColumn('technologies', 'website_url')) {
                $table->string('website_url')->nullable()->after('description');
            }

            // image_path est déjà présent chez toi — on ne touche pas
        });
    }

    public function down(): void
    {
        Schema::table('technologies', function (Blueprint $table) {
            // Revenir en arrière proprement
            if (Schema::hasColumn('technologies', 'is_published') && !Schema::hasColumn('technologies', 'is_active')) {
                $table->renameColumn('is_published', 'is_active');
            }
            if (Schema::hasColumn('technologies', 'order') && !Schema::hasColumn('technologies', 'position')) {
                $table->renameColumn('order', 'position');
            }
            if (Schema::hasColumn('technologies', 'website_url')) {
                $table->dropColumn('website_url');
            }
        });
    }
};
