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

/* welcome.twig */
class __TwigTemplate_47062ff2482de9adf007ce362dfbd3d0 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<html>
<head>
    <title>Welcome</title>
    <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"/apple-touch-icon.png\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"/favicon-32x32.png\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"/favicon-16x16.png\">
    <link rel=\"manifest\" href=\"/site.webmanifest\">
    <link rel=\"mask-icon\" href=\"/safari-pinned-tab.svg\" color=\"#5bbad5\">
    <meta name=\"msapplication-TileColor\" content=\"#da532c\">
    <meta name=\"theme-color\" content=\"#ffffff\">
    <script src=\"https://cdn.tailwindcss.com\"></script>
</head>
<body class=\"bg-gray-900\">

    <div class=\"grid place-items-center h-screen\">
        <div class=\"container mx-auto px-8\">
        <div class=\"bg-gray-800 rounded-lg px-6 py-6 ring-1 ring-slate-900/5 text-slate-400\">
            <h1 class=\"text-white text-2xl\">welcome to your biscy application</h1>
            <p class=\"mt-2\">
                This is a demo app of a janky (m)vc pattern. It's totally shitty and basically emulates Laravel somewhat.
            </p>
            <p class=\"mt-2\">
<pre class=\"text-sm text-neutral-300\">
Base Path:      ";
        // line 24
        echo twig_escape_filter($this->env, ($context["basePath"] ?? null), "html", null, true);
        echo "
App Path:       ";
        // line 25
        echo twig_escape_filter($this->env, ($context["appPath"] ?? null), "html", null, true);
        echo "
Public Path:    ";
        // line 26
        echo twig_escape_filter($this->env, ($context["publicPath"] ?? null), "html", null, true);
        echo "
</pre>
            </p>

            <p class=\"mt-2\">
                <svg xmlns=\"http://www.w3.org/2000/svg\" x=\"0px\" y=\"0px\"
                     width=\"24\" height=\"24\"
                     viewBox=\"0 0 24 24\"
                     style=\" fill:#fff;\">
                    <path d=\"M10.9,2.1c-4.6,0.5-8.3,4.2-8.8,8.7c-0.5,4.7,2.2,8.9,6.3,10.5C8.7,21.4,9,21.2,9,20.8v-1.6c0,0-0.4,0.1-0.9,0.1 c-1.4,0-2-1.2-2.1-1.9c-0.1-0.4-0.3-0.7-0.6-1C5.1,16.3,5,16.3,5,16.2C5,16,5.3,16,5.4,16c0.6,0,1.1,0.7,1.3,1c0.5,0.8,1.1,1,1.4,1 c0.4,0,0.7-0.1,0.9-0.2c0.1-0.7,0.4-1.4,1-1.8c-2.3-0.5-4-1.8-4-4c0-1.1,0.5-2.2,1.2-3C7.1,8.8,7,8.3,7,7.6C7,7.2,7,6.6,7.3,6 c0,0,1.4,0,2.8,1.3C10.6,7.1,11.3,7,12,7s1.4,0.1,2,0.3C15.3,6,16.8,6,16.8,6C17,6.6,17,7.2,17,7.6c0,0.8-0.1,1.2-0.2,1.4 c0.7,0.8,1.2,1.8,1.2,3c0,2.2-1.7,3.5-4,4c0.6,0.5,1,1.4,1,2.3v2.6c0,0.3,0.3,0.6,0.7,0.5c3.7-1.5,6.3-5.1,6.3-9.3 C22,6.1,16.9,1.4,10.9,2.1z\"></path>
                </svg>
            </p>
        </div>
    </div>
</div>

</body>
</html>



";
    }

    public function getTemplateName()
    {
        return "welcome.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 26,  66 => 25,  62 => 24,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<html>
<head>
    <title>Welcome</title>
    <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"/apple-touch-icon.png\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"/favicon-32x32.png\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"/favicon-16x16.png\">
    <link rel=\"manifest\" href=\"/site.webmanifest\">
    <link rel=\"mask-icon\" href=\"/safari-pinned-tab.svg\" color=\"#5bbad5\">
    <meta name=\"msapplication-TileColor\" content=\"#da532c\">
    <meta name=\"theme-color\" content=\"#ffffff\">
    <script src=\"https://cdn.tailwindcss.com\"></script>
</head>
<body class=\"bg-gray-900\">

    <div class=\"grid place-items-center h-screen\">
        <div class=\"container mx-auto px-8\">
        <div class=\"bg-gray-800 rounded-lg px-6 py-6 ring-1 ring-slate-900/5 text-slate-400\">
            <h1 class=\"text-white text-2xl\">welcome to your biscy application</h1>
            <p class=\"mt-2\">
                This is a demo app of a janky (m)vc pattern. It's totally shitty and basically emulates Laravel somewhat.
            </p>
            <p class=\"mt-2\">
<pre class=\"text-sm text-neutral-300\">
Base Path:      {{  basePath }}
App Path:       {{  appPath }}
Public Path:    {{  publicPath }}
</pre>
            </p>

            <p class=\"mt-2\">
                <svg xmlns=\"http://www.w3.org/2000/svg\" x=\"0px\" y=\"0px\"
                     width=\"24\" height=\"24\"
                     viewBox=\"0 0 24 24\"
                     style=\" fill:#fff;\">
                    <path d=\"M10.9,2.1c-4.6,0.5-8.3,4.2-8.8,8.7c-0.5,4.7,2.2,8.9,6.3,10.5C8.7,21.4,9,21.2,9,20.8v-1.6c0,0-0.4,0.1-0.9,0.1 c-1.4,0-2-1.2-2.1-1.9c-0.1-0.4-0.3-0.7-0.6-1C5.1,16.3,5,16.3,5,16.2C5,16,5.3,16,5.4,16c0.6,0,1.1,0.7,1.3,1c0.5,0.8,1.1,1,1.4,1 c0.4,0,0.7-0.1,0.9-0.2c0.1-0.7,0.4-1.4,1-1.8c-2.3-0.5-4-1.8-4-4c0-1.1,0.5-2.2,1.2-3C7.1,8.8,7,8.3,7,7.6C7,7.2,7,6.6,7.3,6 c0,0,1.4,0,2.8,1.3C10.6,7.1,11.3,7,12,7s1.4,0.1,2,0.3C15.3,6,16.8,6,16.8,6C17,6.6,17,7.2,17,7.6c0,0.8-0.1,1.2-0.2,1.4 c0.7,0.8,1.2,1.8,1.2,3c0,2.2-1.7,3.5-4,4c0.6,0.5,1,1.4,1,2.3v2.6c0,0.3,0.3,0.6,0.7,0.5c3.7-1.5,6.3-5.1,6.3-9.3 C22,6.1,16.9,1.4,10.9,2.1z\"></path>
                </svg>
            </p>
        </div>
    </div>
</div>

</body>
</html>



", "welcome.twig", "/home/mikeroq/Code/scratch/biscy/resources/views/welcome.twig");
    }
}