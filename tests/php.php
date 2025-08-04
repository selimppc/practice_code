Service provicer: PHP

<?php
public function register() {
    $this->app->bind('PaymentService', function () {
        return new \App\Services\PaymentService();
    });
}

//handle exceptions globally in NestJS
@Catch()
export class GlobalExceptionFilter implements ExceptionFilter {
    catch(exception: HttpException, host: ArgumentsHost) {
        const ctx = host.switchToHttp();
        const response = ctx.getResponse<Response>();
        const status = exception.getStatus();

        response.status(status).json({
            statusCode: status,
            message: exception.message,
            error: exception.getrResponse().error || 'Internal Server Error',
        });
    }
}

// apply it globally in main.ts:
app.useGlobalFilters(new GlobalExceptionFilter());


//queue in php/laravel
php artisan queue:work --queue=emails --tries=3

// rate limiting in laravel
Route::middleware(['throttle:60, 1'])->group(function () {
    Route::get('/api/resource', 'ResourceController@index');
});

// Database transactions and why are they useful?'
DB::transaction(function () {
    $order = Order::create(
        [
            'order_number' => '12345',
            'amount' => 100.00,
        ]
    );

    $payment = Payment::create([
        'order_id' => $order->id,
        'amount' => 100.00,
    ]);
})
//data consistancy during critial operations like payments, order processing, etc.

//Q: Explain idempotency in REST APIs.
an idempotent API produces the same result when called multiple times. 

PUT: /users/123 payload: {'name': 'John'} }


//Q: what is eventual consistency in distributed systems ?:

// A: 
// Data is eventually synced accross services, but not immediately consistent. It's used in high availability systems *( e.g.: microservices, Kafka consumers, etc. )

// Q: What is a message queue? How do you use RabbitMQ or Kafka?
// A:
// A message queue decouples producers anc consumers. 
// RabbitMQ: lightwight, best for task queues ( Laravel Queue )
// Kafka: distributed log, best for event streaming ( analytics, logging, etc. )


// Q: do you use Laravel Events and Listeners?
// A: Event UserRegistered.php 
class UserResistered implements ShouldQueue {
    public function __construct(public User $user) {}
}

// Listener SendWelcomeEmail.php 
class SendWelcomeEmail {
    public function handle(UserRegistered $event) {
        Mail::to($event->user->email)->send(new WelcomeEmail());
    }
}

// Register in EventServiceProvider.php 
protected $listen = [
    UserRegistered::class => [
        SendWelcomeEmail::class,
    ]
];

// Q: What is a policy in Laravel? How do you use it?
// A: IN AuthServiceProvider.php
Gate::define('update-post', function (User $user, Post $post) {
    return $user->id === $post->user_id; // Check if user owns the post
});// 


// Testing mock in PHPUnit
$mock = Mockery::mock(UserService::class);
$mock->shouldReceive('find')->andReturn($user);


// Q: How do you handle file uploads in Laravel?
// A: Use the `store` method on the uploaded file instance to save it to a specified disk.

// Example:
public function upload(Request $request) {
    $request->validate([
        'file' => 'required|file|mimes:jpg,png,pdf|max:2048',
    ]);

    $path = $request->file('file')->store('uploads', 'public');

    return response()->json(['path' => $path], 201);
}   

# Deep Dive into OOP pillars with PHP + Nodejs:

1. Encapsulation: 
   - PHP: Use classes to encapsulate data and methods.
   - Node.js: Use modules to encapsulate functionality.

   📌 Why it's important:
    a. Prevents unauthorized access to data.
    b. Adds validation logic (e.g. cannot set a blank name).
    c. Keeps code modular and secure.

2. Abstraction:
   - PHP: Use abstract classes and interfaces to define contracts.
   - Node.js: Use ES6 classes and interfaces (via TypeScript) to define abstract behavior.

   📌 Why it's important:
    a. DRY code (Don't Repeat Yourself).
    b. Easier to extend/override behavior.
    c. Improves maintainability.

3. Inheritance:
   - PHP: Use `extends` keyword to inherit from parent classes.
   - Node.js: Use `extends` keyword in ES6 classes to inherit from parent classes

   📌 Why it's important:
    a. Allows same method to behave differently based on context.
    b. Enables interfaces and abstract classes.

4. Polymorphism:
   - PHP: Use method overriding to achieve polymorphism.
   - Node.js: Use method overriding in ES6 classes to achieve polymorphism.

   📌 Why it's important:
    Helps in designing clear, modular APIs.
    Reduces complexity.
    Encourages layered design (e.g., service layer, interface layer).

// Q: How do you handle CORS in Laravel?   
A: You can handle CORS in Laravel by adding the following middleware to your `kernel.php` file: 
```php
protected $middleware = [   
    \App\Http\Middleware\Cors::class,
];  
```

// Then, create the `Cors` middleware to set the appropriate headers:
```php
namespace App\Http\Middleware;      
use Closure;
use Illuminate\Http\Request;
class Cors
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }
}
```


PHP artisan command : for queue: 
    /var/www/html $ php artisan queue:work --queue=default --tries=1
    --timeout=60

    