<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmailTemplate>
 */
class EmailTemplateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'coach_id' => 0,
            'template_for' => getEmailTemplateTypes(0),
            'subject' => 'Notification',
            'body' => '
                <p>Hello&nbsp;<strong>[student-first_name]</strong>!<br />
                <br />
                The recruiter has rejected your application for the [program-program_name] program.</p>
                <p>&nbsp;</p>
            ',
            'status' => 'active',
        ];
    }
}
