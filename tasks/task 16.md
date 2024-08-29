1- what is Queues ?
        While building your web application, you may have some tasks, such as parsing and storing an uploaded CSV file, that take too long to perform during a typical web request. Thankfully, Laravel allows you to easily create queued jobs that may be processed in the background. By moving time intensive tasks to a queue, your application can respond to web requests with blazing speed and provide a better user experience to your customers.
        Laravel queues provide a unified queueing API across a variety of different queue backends, such as Amazon SQS, Redis, or even a relational database.

2-Laravel's queue configuration options are stored in your application's config/queue.php configuration file. In this file, you will find connection configurations for each of the queue drivers that are included with the framework, including the database, Amazon SQS, Redis, and Beanstalkd drivers, as well as a synchronous driver that will execute jobs immediately (for use during local development). A null queue driver is also included which discards queued jobs.

3-Connections vs. Queues
Before getting started with Laravel queues, it is important to understand the distinction between "connections" and "queues". In your config/queue.php configuration file, there is a connections configuration array. This option defines the connections to backend queue services such as Amazon SQS, Beanstalk, or Redis. However, any given queue connection may have multiple "queues" which may be thought of as different stacks or piles of queued jobs.

4-Driver Notes and Prerequisites
Database
In order to use the database queue driver, you will need a database table to hold the jobs. Typically, this is included in Laravel's default 0001_01_01_000002_create_jobs_table.php database migration; however, if your application does not contain this migration, you may use the make:queue-table Artisan command to create it:

php artisan make:queue-table
 
php artisan migrate

5-Creating Jobs
Generating Job Classes
By default, all of the queueable jobs for your application are stored in the app/Jobs directory. If the app/Jobs directory doesn't exist, it will be created when you run the make:job Artisan command:

php artisan make:job ProcessPodcast

The generated class will implement the Illuminate\Contracts\Queue\ShouldQueue interface, indicating to Laravel that the job should be pushed onto the queue to run asynchronously.

6-Encrypted Jobs
Laravel allows you to ensure the privacy and integrity of a job's data via encryption. To get started, simply add the ShouldBeEncrypted interface to the job class. Once this interface has been added to the class, Laravel will automatically encrypt your job before pushing it onto a queue.
Unique Job Locks
Behind the scenes, when a ShouldBeUnique job is dispatched, Laravel attempts to acquire a lock with the uniqueId key. If the lock is not acquired, the job is not dispatched. This lock is released when the job completes processing or fails all of its retry attempts. By default, Laravel will use the default cache driver to obtain this lock. However, if you wish to use another driver for acquiring the lock, you may define a uniqueVia method that returns the cache driver that should be used.

7-Unique Job Locks
Behind the scenes, when a ShouldBeUnique job is dispatched, Laravel attempts to acquire a lock with the uniqueId key. If the lock is not acquired, the job is not dispatched. This lock is released when the job completes processing or fails all of its retry attempts. By default, Laravel will use the default cache driver to obtain this lock. However, if you wish to use another driver for acquiring the lock, you may define a uniqueVia method that returns the cache driver that should be used:

8-Job Middleware
Job middleware allow you to wrap custom logic around the execution of queued jobs, reducing boilerplate in the jobs themselves. For example, consider the following handle method which leverages Laravel's Redis rate limiting features to allow only one job to process every five seconds

9-Preventing Job Overlaps
Laravel includes an Illuminate\Queue\Middleware\WithoutOverlapping middleware that allows you to prevent job overlaps based on an arbitrary key. This can be helpful when a queued job is modifying a resource that should only be modified by one job at a time.

For example, let's imagine you have a queued job that updates a user's credit score and you want to prevent credit score update job overlaps for the same user ID. To accomplish this, you can return the WithoutOverlapping middleware from your job's middleware method:

use Illuminate\Queue\Middleware\WithoutOverlapping;
 
/**
 * Get the middleware the job should pass through.
 *
 * @return array<int, object>
 */
public function middleware(): array
{
    return [new WithoutOverlapping($this->user->id)];
}

10-Testing Job / Batch Interaction
In addition, you may occasionally need to test an individual job's interaction with its underlying batch. For example, you may need to test if a job cancelled further processing for its batch. To accomplish this, you need to assign a fake batch to the job via the withFakeBatch method. The withFakeBatch method returns a tuple containing the job instance and the fake batch:

[$job, $batch] = (new ShipOrder)->withFakeBatch();
 
$job->handle();
 
$this->assertTrue($batch->cancelled());
$this->assertEmpty($batch->added);
