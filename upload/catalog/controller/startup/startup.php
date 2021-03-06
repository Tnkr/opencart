<?php
namespace Opencart\Application\Controller\Startup;
class Startup extends \Opencart\System\Engine\Controller {
	public function index() {
		// Load startup actions
		$this->load->model('setting/startup');

		$results = $this->model_setting_startup->getStartups();

		foreach ($results as $result) {
			if (substr($result['action'], 0, 8) == 'catalog/') {
				$this->load->controller(substr($result['action'], 8));
			}
		}
	}
}