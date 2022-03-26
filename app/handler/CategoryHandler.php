<?php

namespace Reiko\App;

/**
 * REIKO FRAMEWORK 
 *  
 * @package ReiKo Framework
 *
 * @author alinko <alinkokomansuby@gmail.com>
 * @author ReiYan <hariyantoriyan.hr@gmail.com>
 * @copyright (c) 2021 
 * 
 * @license MIT 
 * 
 */

use Reiko\Libraries\Handler;
use Reiko\Libraries\Response;

class CategoryHandler extends Handler
{

    public function index()
    {
        // some code here.
    }
    public function all()
    {
        return Response::apiBuilder(dbfun('Reiko\Categories')->readAll(), 'success');
    }
    public function detail($id)
    {
        return Response::apiBuilder(dbfun('Reiko\Categories')->readById($id), 'success');
    }
}
