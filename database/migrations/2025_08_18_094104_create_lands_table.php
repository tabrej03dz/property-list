<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_id')->nullable()->constrained('users')->nullOnDelete();

            // Core listing info
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('reference_code')->nullable()->unique(); // internal/public code
            $table->longText('description')->nullable();

            $table->enum('listing_type', ['sale', 'rent', 'lease'])->default('sale');
            $table->enum('status', ['draft', 'published', 'available', 'sold', 'archived'])->default('draft');

            // Pricing
            $table->decimal('price', 15, 2)->nullable();
            $table->enum('price_unit', [
                'total', 'per_sqft', 'per_sqyd', 'per_sqmt', 'per_acre', 'per_bigha', 'per_hectare'
            ])->default('total');
            $table->char('currency', 3)->default('INR');
            $table->boolean('is_negotiable')->default(false);

            // Area & dimensions
            $table->decimal('area_value', 12, 2)->nullable();
            $table->enum('area_unit', [
                'sqft', 'sqyd', 'sqmt', 'acre', 'hectare', 'bigha', 'guntha', 'cent', 'marla', 'biswa', 'katha'
            ])->nullable();

            $table->decimal('plot_length', 10, 2)->nullable();
            $table->decimal('plot_breadth', 10, 2)->nullable();
            $table->enum('dimensions_unit', ['ft', 'yd', 'm'])->default('ft');

            $table->decimal('frontage', 10, 2)->nullable();    // road/plot frontage
            $table->boolean('corner_plot')->default(false);
            $table->decimal('road_width', 6, 2)->nullable();
            $table->enum('road_unit', ['ft', 'm', 'yd'])->default('ft');

            $table->enum('facing', ['N','NE','E','SE','S','SW','W','NW'])->nullable();
            $table->enum('shape', ['rectangular','square','irregular','trapezium','triangular','other'])->nullable();

            // Use / zoning / buildability
            $table->enum('land_use', [
                'residential','commercial','agricultural','industrial','mixed','institutional','warehouse'
            ])->nullable();
            $table->string('zoning')->nullable();
            $table->decimal('fsi', 5, 2)->nullable(); // FAR/FSI

            // Ownership / legal
            $table->enum('ownership', ['freehold','leasehold','power_of_attorney','cooperative','company','other'])->nullable();
            $table->unsignedSmallInteger('tenure_years')->nullable();

            $table->string('rera_id')->nullable();
            $table->string('survey_number')->nullable();
            $table->string('khasra_number')->nullable();
            $table->string('plot_number')->nullable();
            $table->string('khata_number')->nullable();
            $table->boolean('is_non_agricultural')->nullable(); // NA conversion (India)
            $table->boolean('title_clear')->default(true);
            $table->text('encumbrances')->nullable();
            $table->boolean('loan_available')->default(false);

            // Utilities / on-site features
            $table->boolean('water_connection')->default(false);
            $table->boolean('electricity_connection')->default(false);
            $table->boolean('sewage_connection')->default(false);
            $table->boolean('gas_connection')->default(false);
            $table->boolean('borewell')->default(false);
            $table->boolean('compound_wall')->default(false);
            $table->boolean('street_lights')->default(false);
            $table->boolean('drainage')->default(false);
            $table->boolean('rainwater_harvesting')->default(false);
            $table->boolean('irrigation_facility')->default(false);

            // Flexible metadata
            $table->json('amenities')->nullable();   // e.g. ["clubhouse","security"]
            $table->json('tags')->nullable();        // e.g. ["corner","main-road"]
            $table->json('documents')->nullable();   // URLs or metadata for docs

            // Media
            $table->string('primary_image')->nullable();
            $table->string('video_url')->nullable();

            // Location
            $table->string('address_line')->nullable();
            $table->string('landmark')->nullable();
            $table->string('locality')->nullable();  // area/sector/village
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode', 10)->nullable();
            $table->string('country')->default('India');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lands');
    }
};
