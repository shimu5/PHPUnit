# PHPUnit
Unit Test: Test a specific function or a class, We use stubing or mocking , For mocking we can use mockery Framework.
Integration test:  Just like unit test, Except it uses the real database connection.
Functional Test: Write a test to programmatically command a browser.

Symfony Testing link: 
https://symfony.com/doc/current/testing.html


Unit Test:  PHPUnit

Sebastian Bergmann is the creator of PHPUnit. He co-founded thePHP.cc and helps PHP teams build better software.
From <https://github.com/sebastianbergmann> 

PHPunit Docs:
https://phpunit.readthedocs.io/en/9.3/configuration.html

PHPUnit Setup for windows:
First install composer, Then Create a project directory "PHPUnitTest"
And create a composer.json file.
And then run command :
C:\xampp\htdocs\PHPUnitTest> composer require --dev phpunit/phpunit ^9

Then create folder "src" and "tests"

C:\xampp\htdocs\PHPUnitTest>  vendor\bin\phpunit --version
C:\xampp\htdocs\PHPUnitTest>  vendor\bin\phpunit tests
C:\xampp\htdocs\PHPUnitTest>  vendor\bin\phpunit --verbose tests\TestDependecies\DependencyFailureTest.php

Write all available tests on xml format:
C:\xampp\htdocs\PHPUnitTest>vendor\bin\phpunit --verbose  tests  --list-tests-xml shamima.xml
Command-Line Options
Let’s take a look at the command-line test runner’s options in the following code
From <https://phpunit.readthedocs.io/en/9.3/textui.html> 

Use test result in colors:
C:\xampp\htdocs\PHPUnitTest>vendor\bin\phpunit --verbose  tests\TestDependecies\DependencyFailureTest.php --colors always

TestDox
PHPUnit’s TestDox functionality looks at a test class and all the test method names and converts them from camel case (or snake_case) PHP names to sentences: testBalanceIsInitiallyZero() (or test_balance_is_initially_zero() becomes “Balance is initially zero”. 
C:\xampp\htdocs\PHPUnitTest>vendor\bin\phpunit  -testdox --testsuite Errors

From <https://phpunit.readthedocs.io/en/9.3/textui.html> 


Fixture:
PHPUnit supports sharing the setup code. Before a test method is run, a template method called setUp() is invoked. setUp() is where you create the objects against which you will test. Once the test method has finished running, whether it succeeded or failed, another template method called tearDown() is invoked. tearDown() is where you clean up the objects against which you tested.

Sharing Fixture
There are few good reasons to share fixtures between tests, but in most cases the need to share a fixture between tests stems from an unresolved design problem.
A good example of a fixture that makes sense to share across several tests is a database connection: you log into the database once and reuse the database connection instead of creating a new connection for each test. This makes your tests run faster.
Example 4.3 uses the setUpBeforeClass() and tearDownAfterClass() template methods to connect to the database before the test case class’ first test and to disconnect from the database after the last test of the test case, respectively.
/* 
use PHPUnit\Framework\TestCase;
class DatabaseTest extends TestCase
{
    protected static $dbh;
public static function setUpBeforeClass(): void
    {
        self::$dbh = new PDO('sqlite::memory:');
    }
public static function tearDownAfterClass(): void
    {
        self::$dbh = null;
    }
}
From <https://phpunit.readthedocs.io/en/9.3/fixtures.html> 
*/
We can follow these 2 githhub links to know more about the bergmann PHPUnit Tests:
https://github.com/moneyphp/money
https://github.com/sebastianbergmann/money/

Organizing Tests:
Creating Testsuite by phpunit.xml file

And run code depend on the test-suite name
C:\xampp\htdocs\PHPUnitTest>vendor\bin\phpunit  --testsuite fixures
/*
<phpunit bootstrap="src/autoload.php">
  <testsuites>
    <testsuite name="money">
      <file>tests/IntlFormatterTest.php</file>
      <file>tests/MoneyTest.php</file>
      <file>tests/CurrencyTest.php</file>
    </testsuite>
  </testsuites>
</phpunit>

From <https://phpunit.readthedocs.io/en/9.3/organizing-tests.html#organizing-tests-xml-configuration-examples-phpunit-xml> 

*/

Test Doubles
When we are writing a test in which we cannot (or chose not to) use a real depended-on component (DOC), we can replace it with a Test Double. The Test Double doesn’t have to behave exactly like the real DOC; it merely has to provide the same API as the real one so that the SUT thinks it is the real one!
The createStub($type), createMock($type), and getMockBuilder($type) methods provided by PHPUnit can be used in a test to automatically generate an object that can act as a test double for the specified original type (interface or class name). This test double object can be used in every context where an object of the original type is expected or required.
Limitation: final, private, and static methods
Please note that final, private, and static methods cannot be stubbed or mocked. They are ignored by PHPUnit’s test double functionality and retain their original behavior except for static methods that will be replaced by a method throwing a \PHPUnit\Framework\MockObject\BadMethodCallException exception.

Testdoubles will do stubbing or mocking:
https://phpunit.readthedocs.io/en/9.3/test-doubles.html
Stubs
The practice of replacing an object with a test double that (optionally) returns configured return values is referred to as stubbing. You can use a stub to “replace a real component on which the SUT depends so that the test has a control point for the indirect inputs of the SUT. This allows the test to force the SUT down paths it might not otherwise execute”.
From <https://phpunit.readthedocs.io/en/9.3/test-doubles.html
