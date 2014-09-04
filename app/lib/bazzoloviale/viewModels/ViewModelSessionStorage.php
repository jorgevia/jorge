<?php
/**
 * Created by PhpStorm.
 * User: JorgeLuis
 * Date: 9/2/2014
 * Time: 12:03 AM
 */

namespace Bazzoloviale\viewModels;
use \Illuminate\Session\SessionManager;

class ViewModelSessionStorage implements ViewModelCacheStorageInterface {

    protected $session;

    public function __construct(SessionManager $session) {
        $this->session = $session;
    }

    public function store(array $viewModels) {
        //saves the model in the session
        $this->session->push('viewModels',$viewModels);
    }

    public function load() {
        if ($this->session->has('viewModels')) {
            return $this->session->get('viewModels');
        }
        return null;
    }
} 