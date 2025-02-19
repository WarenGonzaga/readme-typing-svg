<?php declare (strict_types = 1);
use PHPUnit\Framework\TestCase;

require 'vendor/autoload.php';

final class OptionsTest extends TestCase
{
    /**
     * Test exception thrown when missing 'lines' parameter
     */
    public function testMissingLines(): void
    {
        $this->expectException("InvalidArgumentException");
        $this->expectExceptionMessage("Lines parameter must be set.");
        $params = array(
            "center" => "true",
            "width" => "380",
            "height" => "50",
        );
        print_r(new RendererModel("src/templates/main.php", $params));
    }

    /**
     * Test valid font
     */
    public function testValidFont(): void
    {
        $params = array(
            "lines" => "text",
            "font" => "Open Sans",
        );
        $model = new RendererModel("src/templates/main.php", $params);
        $this->assertEquals("Open Sans", $model->font);
    }

    /**
     * Test valid font color
     */
    public function testValidFontColor(): void
    {
        $params = array(
            "lines" => "text",
            "color" => "000000",
        );
        $model = new RendererModel("src/templates/main.php", $params);
        $this->assertEquals("#000000", $model->color);
    }

    /**
     * Test invalid font color
     */
    public function testInvalidFontColor(): void
    {
        $params = array(
            "lines" => "text",
            "color" => "00000",
        );
        $model = new RendererModel("src/templates/main.php", $params);
        $this->assertEquals("#36BCF7", $model->color);
    }

    /**
     * Test valid font size
     */
    public function testValidFontSize(): void
    {
        $params = array(
            "lines" => "text",
            "size" => "18",
        );
        $model = new RendererModel("src/templates/main.php", $params);
        $this->assertEquals(18, $model->size);
    }

    /**
     * Test exception thrown when font size is invalid
     */
    public function testInvalidFontSize(): void
    {
        $this->expectException("InvalidArgumentException");
        $this->expectExceptionMessage("Font size must be a positive number.");
        $params = array(
            "lines" => "text",
            "size" => "0",
        );
        print_r(new RendererModel("src/templates/main.php", $params));
    }

    /**
     * Test valid height
     */
    public function testValidHeight(): void
    {
        $params = array(
            "lines" => "text",
            "height" => "80",
        );
        $model = new RendererModel("src/templates/main.php", $params);
        $this->assertEquals(80, $model->height);
    }

    /**
     * Test exception thrown when height is invalid
     */
    public function testInvalidHeight(): void
    {
        $this->expectException("InvalidArgumentException");
        $this->expectExceptionMessage("Height must be a positive number.");
        $params = array(
            "lines" => "text",
            "height" => "x",
        );
        print_r(new RendererModel("src/templates/main.php", $params));
    }

    /**
     * Test valid width
     */
    public function testValidWidth(): void
    {
        $params = array(
            "lines" => "text",
            "width" => "500",
        );
        $model = new RendererModel("src/templates/main.php", $params);
        $this->assertEquals(500, $model->width);
    }

    /**
     * Test exception thrown when width is invalid
     */
    public function testInvalidWidth(): void
    {
        $this->expectException("InvalidArgumentException");
        $this->expectExceptionMessage("Width must be a positive number.");
        $params = array(
            "lines" => "text",
            "width" => "-1",
        );
        print_r(new RendererModel("src/templates/main.php", $params));
    }

    /**
     * Test center set to true
     */
    public function testCenterIsTrue(): void
    {
        $params = array(
            "lines" => "text",
            "center" => "true",
        );
        $model = new RendererModel("src/templates/main.php", $params);
        $this->assertEquals(true, $model->center);
    }

    /**
     * Test center not set to true
     */
    public function testCenterIsNotTrue(): void
    {
        $params = array(
            "lines" => "text",
            "center" => "other",
        );
        $model = new RendererModel("src/templates/main.php", $params);
        $this->assertEquals(false, $model->center);
    }
}
