<?php
$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/app') 
    ->in(__DIR__.'/tests')
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCSIgnored(true);

$config = new PhpCsFixer\Config();

return $config->setRules([
    '@PSR12' => true,  // Follow PSR-12 coding style
    'array_syntax' => ['syntax' => 'short'],
    'binary_operator_spaces' => ['default' => 'align_single_space_minimal'],
    'blank_line_after_namespace' => true,
    'blank_line_after_opening_tag' => true,
    'blank_line_before_statement' => [
        'statements' => ['return']
    ],
    'cast_spaces' => ['space' => 'single'],
    'class_attributes_separation' => [
        'elements' => ['method' => 'one']
    ],
    'concat_space' => ['spacing' => 'one'],  
    'declare_equal_normalize' => ['space' => 'none'],
    'function_typehint_space' => true,
    'include' => true,
    'increment_style' => ['style' => 'post'],
    'lowercase_cast' => true,
    'lowercase_keywords' => true,
    'method_argument_space' => ['on_multiline' => 'ensure_fully_multiline'],
    'native_function_casing' => true,
    'no_alias_functions' => true,
    'no_closing_tag' => true,
    'no_empty_phpdoc' => true,
    'no_leading_namespace_whitespace' => true,
    'no_spaces_around_offset' => true,
    'no_unused_imports' => true,
    'no_whitespace_before_comma_in_array' => true,
    'single_trait_insert_per_statement' => true,
    'trailing_comma_in_multiline' => ['elements' => ['arrays']],
    'trim_array_spaces' => true,
    'unary_operator_spaces' => true,
    'whitespace_after_comma_in_array' => true,
])
->setRiskyAllowed(true)
->setFinder($finder);