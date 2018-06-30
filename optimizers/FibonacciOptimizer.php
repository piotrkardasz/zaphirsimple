<?php

namespace Zephir\Optimizers\FunctionCall;

use Zephir\Call;
use Zephir\CompilationContext;
use Zephir\CompiledExpression;
use Zephir\Optimizers\OptimizerAbstract;
use Zephir\CompilerException;

class FibonacciOptimizer extends OptimizerAbstract

{   
    public function optimize(array $expression, Call $call, CompilationContext $context)
    {
        $context->headersManager->add('my-fibonacci');

        $resolvedParams = $call->getReadOnlyResolvedParams($expression['parameters'], $context, $expression);
        return new CompiledExpression('int', 'fibonacci(' . $resolvedParams[0] . ')', $expression);
    }
}