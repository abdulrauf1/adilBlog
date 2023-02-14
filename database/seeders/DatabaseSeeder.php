<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\PaymentPlans;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $seededAdminEmail = 'admin@admin.com';
        $user = User::where('email', '=', $seededAdminEmail)->first();
        if ($user === null) {
            $user = User::create([
                'name'                           => 'Admin',
                'email'                          => $seededAdminEmail,
                'password'                       => Hash::make('12345678'),
            ]);

            $plan1 = PaymentPlans::create([
                'title'                           => 'PERSONAL FINANCIAL SET-UP',
                'description'                          => 'Budgeting Debt pay-off plan Retirement Savings Plan Simple Estate Plan Financial Goal Setting $ 399 set-up Free',                
                'paymentInstallments'                       => 60,
                'paymentAmount'                       => 399,
                'user_id'                           => 1
            ]);

            $plan2 = PaymentPlans::create(
            [
                'title'                           => 'SELF-EMLOYED FINANCIAL PLAN SET-UP',
                'description'                          => 'Budgeting Tax Planning Debt pay-off plan Simple Estate Plan Financial Goal Setting $ 499 set-up Free',
                'paymentInstallments'                       => 70,
                'paymentAmount'                       => 499,
                'user_id'                           => 1
            ]);

            $plan3 = PaymentPlans::create(
            [
                'title'                           => 'SELF-MOTIVATOR COURSE',
                'description'                          => 'Budgeting Tax Planning Debt pay-off plan Simple Estate Plan Financial Goal Setting $ 299 set-up Free',
                'paymentInstallments'                       => 0,
                'paymentAmount'                       => 299,
                'user_id'                           => 1
            ]);
        }
        
        
    }
}
