<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* template.twig.html */
class __TwigTemplate_62ddd72dc1b58c12bd05e3597dca005a67ae5c1d6acdfcb59cdb55e60e150025 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">

    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\"
        integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\" crossorigin=\"anonymous\">
    <title>Document</title>
</head>

<body>
    <header>
        <ul class=\"nav justify-content-end\">
            ";
        // line 17
        if (twig_test_empty(($context["user"] ?? null))) {
            // line 18
            echo "            
            <li class=\"nav-item\">
                <a href=\"/register\" class=\"nav-link\">Register</a>
            </li>
            <li class=\"nav-item\">
                <a href=\"/login\" class=\"nav-link\">Login</a>
            </li>
            
            ";
        }
        // line 27
        echo "
            ";
        // line 28
        if (($context["user"] ?? null)) {
            // line 29
            echo "
            <div class=\"dropdown\">
                <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" id=\"dropdownMenu2\" data-toggle=\"dropdown\" aria-expanded=\"false\">
                    ";
            // line 32
            echo twig_escape_filter($this->env, ($context["user"] ?? null), "html", null, true);
            echo "
                </button>

                <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu2\">
                    <a href=\"/profile\" class=\"dropdown-item\" type=\"button\">Profile</a>
                    <a href=\"/logout\" class=\"dropdown-item\" type=\"button\">Logout</a>
                </div>
            </div>

            ";
        }
        // line 42
        echo "        </ul>
    </header>

    ";
        // line 45
        $this->displayBlock('body', $context, $blocks);
        // line 47
        echo "
    <script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\"
        integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin=\"anonymous\">
    </script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\"
        integrity=\"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\" crossorigin=\"anonymous\">
    </script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\"
        integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\">
    </script>
</body>

</html>";
    }

    // line 45
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 46
        echo "    ";
    }

    public function getTemplateName()
    {
        return "template.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 46,  115 => 45,  99 => 47,  97 => 45,  92 => 42,  79 => 32,  74 => 29,  72 => 28,  69 => 27,  58 => 18,  56 => 17,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "template.twig.html", "/home/carlos/Projects/FrameworkPHP/templates/template.twig.html");
    }
}
