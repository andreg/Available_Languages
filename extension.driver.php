<?php

	Class extension_available_languages extends Extension{

		public function about(){
			return array(
				'name' => 'Available Languages',
				'version' => '0.0.1',
				'release-date' => '2011-06-07',
				'author' => array(
					'name' => 'Andrea Gandino',
					'website' => 'http://andreagandino.com',
					'email' => 'andreagandino@gmail.com'
					)
				);
		}

		public function getSubscribedDelegates(){
			return array();
		}
		
		/**
		 * Check if Language Redirect is enabled. Warning issued if not.
		 */
		public function dependencies_check() {
			$ExtensionManager = $this->_Parent->ExtensionManager;

			$language_redirect = $ExtensionManager->fetchStatus('language_redirect');

			if($language_redirect != EXTENSION_ENABLED) {
				Administration::instance()->Page->Alert = new Alert(
					__('<code>Available Languages</code> depends on <code>%s</code>. Make sure you have this extension installed and enabled.', array('Language Redirect')), 
					Alert::ERROR
				);
			}
		}

	}

