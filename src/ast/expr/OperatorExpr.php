<?php

namespace UranoCompiler\Ast\Expr;

use \UranoCompiler\Lexer\Tag;
use \UranoCompiler\Parser\Parser;

class OperatorExpr implements Expr
{
  public $left;
  public $operator;
  public $right;

  public function __construct(Expr $left, $operator, Expr $right)
  {
    $this->left = $left;
    $this->operator = $operator;
    $this->right = $right;
  }

  public function format(Parser $parser)
  {
    $string_builder = [$this->left->format($parser)];
    $string_builder[] = ' ';
    $string_builder[] = Tag::getPunctuator($this->operator);
    $string_builder[] = ' ';
    $string_builder[] = $this->right->format($parser);
    return implode($string_builder);
  }
}
