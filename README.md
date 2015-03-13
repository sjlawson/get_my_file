# get_my_file
PHP class to retrieve files located in directories outside the web server context

### Use carefully - there are definite security concerns with this class.
It is assumed that the developer knows well enough to not pass user variable into the path 

## Usage
Include the class either with :

<tt>require_once('GetMyFile.class.php'); </tt> <br>
or by adding it to your auto include scheme.

<pre>
$fileGetter = new GetMyFile('/path/to/some/file.ext');
$fileGetter->serveFile();
</pre>

Of course, the web server user will have to have read access to the file and execute access to the traverse the path
