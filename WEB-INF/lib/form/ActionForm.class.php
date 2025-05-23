<?php


// TODO: Refactor this entire class.
import('ttDate');

class ActionForm {
	var $mName		= "";
	var $mSessionCell;
    var $mValues	= array(); // values without localisation
    var $mVariables = array();
    var $mForm		= null;
    var $mInitForm	= false;

    function __construct($name, &$form, $request=null) {
    	$this->setName($name);
		$this->setForm($form);
		//if ($request) $this->initAttributes($request);
		$this->initAttributes($request);
    }
    
    function setForm(&$form) {
    	$this->mForm = $form;
    	$elements = $form->getElements();
    	if (is_array($elements))
    		$this->setVariablesNames(array_keys($elements));
    }
    
    function &getFormElement($name) {
    	if ($this->mForm!=null) {
            return  $this->mForm->elements[$name];
    	}
    	return null;
    }
    
    function getName() {
		return $this->mName;
	}

    function setName($name) {
		$this->name = $name;
		$this->mSessionCell = "formbean_".$this->name;
	}
    
    /**
     * init parameters and form
     *
     * @param object $request
     */
    function initAttributes(&$request) {
        $submit_flag = (is_object($request) && ($request->isPost()));
        	
        if ($submit_flag) {
        	// fill ActionForm and Form from Request

	    	foreach ($this->mVariables as $name) {
     			if ($this->mForm->elements[$name] && $request->getParameter($name)) {
	     		    $this->mForm->elements[$name]->setValue($request->getParameter($name));
    			    $this->mValues[$name] = $this->mForm->elements[$name]->getValue();
	    		}
	        }
        } else {
        	// fill ActionForm from Session
        	$this->loadBean();
        }
        
        // fill Form by ActionForm
        if ($this->mForm) {
	        $elements = $this->mForm->getElements();
			foreach ($elements as $name=>$el) {
    			if ($this->mForm->elements[$name] && isset($this->mValues[$name])) {
				    $this->mForm->elements[$name]->setValue($this->mValues[$name]);
	    	    }
	        }
	        $this->mInitForm = true;
        }
    }

    function setVariablesNames($namelist) {
        $this->mVariables = $namelist;
    }

    function setAttribute($name,$value) {
    	global $user;

        $this->mValues[$name] = $value;
        if ($this->mForm) {
        	if (isset($this->mForm->elements[$name])) {
        		if ($this->mForm->elements[$name]->class=="DateField") {
                            // We get here when loading a fav report. Refactor this entire class.
                            $dt = new ttDate($value, $user->getDateFormat());
                            $value = $dt->toString();
        		}
        		$this->mForm->elements[$name]->setValueSafe($value);
        	}
        }
    }

    function getAttribute($name) {
        return @$this->mValues[$name];
    }
	
	function getAttributes() {
        return $this->mValues;
    }

    function validate(&$actionMapping, &$request) {
        return null;
    }

	function setAttributes($value) {
		global $user;
		
        $this->mValues = $value;
        if (is_array($this->mValues))
        foreach ($this->mValues as $name=>$value) {
	        if ($this->mForm) {
	        	if (isset($this->mForm->elements[$name])) {
	        		if ($this->mForm->elements[$name]->class=="DateField") {
                                    // We get here when changing to --- no --- fav report. Refactor this entire class.
                                    $dt = new ttDate($value, $user->getDateFormat());
                                    $value = $dt->toString();
	        		}
	        		$this->mForm->elements[$name]->setValueSafe($value);
	        	}
	        }
        }
    }
    
    function dump() {
        print_r($this->mValues);
    }
    
    function saveBean() {
    	if ($this->mForm) {
    		$elements = $this->mForm->getElements();
    		$el_list = array();
    		foreach ($elements as $el) {
    			$el_list[] = array("name"=>$el->getName(),"class"=>$el->getClass());
    			
				$_SESSION[$this->mSessionCell . "_" . $el->getName()] = $el->getValueSafe();
    		}
    		$_SESSION[$this->mSessionCell . "session_store_elements"] = $el_list;
    	}
    	//print_r($_SESSION);
    }

  // saveDetachedAttribute saves a "detached" from form named attributed in session.
  // There is no element in the form for it.
  // Intended use is to add something to the session, when a form bean created on one page
  // is used on other pages (ex.: reportForm).
  // For example, to generate a timesheet we need a user_id, which is determined when a report
  // is generated on report.php, using a bean created in reports.php.
  function saveDetachedAttribute($name, $value) {
    $_SESSION[$this->mSessionCell .'_'.$name] = $value;
  }

  function getDetachedAttribute($name) {
    return $_SESSION[$this->mSessionCell.'_'.$name];
  }
    
    function loadBean() {
    	$el_list = @$_SESSION[$this->mSessionCell . "session_store_elements"];
    	if (is_array($el_list)) {
    		foreach ($el_list as $ref_el) {
    			
    			// restore form elements
    			import('form.'.$ref_el["class"]);
    			$class_name = $ref_el["class"];
    			$el = new $class_name($ref_el["name"]);
                        $el->localize();
    			$el->setValueSafe(@$_SESSION[$this->mSessionCell . "_" .$el->getName()]);
    			
				if ($this->mForm && !isset($this->mForm->elements[$ref_el["name"]])) {
					$this->mForm->elements[$ref_el["name"]] = &$el;
				}
    			$this->mValues[$el->getName()] = $el->getValue();
    		}
    	}
   		//print_r($_SESSION);
    }
    
    function destroyBean() {
    	$el_list = @$_SESSION[$this->mSessionCell . "session_store_elements"];
    	if (is_array($el_list)) {
    		foreach ($el_list as $ref_el) {
    			unset($_SESSION[$this->mSessionCell . "_" .$ref_el["name"]]);
    		}
    	}
    	unset($_SESSION[$this->mSessionCell . "session_store_elements"]);
    }
    
    function isSaved() {
    	return (isset($_SESSION[$this->mSessionCell . "session_store_elements"]) ? true : false);
    }
}
