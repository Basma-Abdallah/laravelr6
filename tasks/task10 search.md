Path Traversal Attack
A path traversal attack occurs when an attacker manipulates file paths to access files and directories that are outside the intended directory. This can lead to unauthorized access to sensitive files, such as configuration files or user data.

Prevention in Laravel:
Sanitize User Input: Always sanitize and validate user inputs that are used in file paths.
Use Built-in Functions: Utilize Laravel’s built-in functions like storage_path() and realpath() to resolve and validate file paths.
Restrict File Access: Ensure that only specific directories are accessible and use middleware to enforce authentication and authorization.
Example Code:
PHP

$filename = basename($request->input('filename'));
$path = storage_path('app/files/' . $filename);
if (!file_exists($path)) {
    abort(404);
}
return response()->file($path);
AI-generated code. Review and use carefully. More info on FAQ.
Double Encoding
Double encoding involves encoding characters multiple times to bypass security filters. For example, an attacker might encode ../ as %252e%252e%252f to bypass path traversal protections.

Prevention in Laravel:
Normalize Input: Decode and normalize input before processing it.
Use Framework Features: Leverage Laravel’s validation and sanitization features to handle input securely.
Example Code:
PHP

$input = urldecode($request->input('path'));
$normalizedPath = realpath(storage_path($input));
if (strpos($normalizedPath, storage_path()) !== 0) {
    abort(403, 'Forbidden');
}