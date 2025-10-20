<?php
namespace App\Modules\Dashboard\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use App\Modules\Dashboard\Models\AuthModel;
use App\Modules\Dashboard\Models\UserModel;
use App\Modules\Dashboard\Models\Permission_model;
use App\Modules\Dashboard\Models\Language_model;
use App\Modules\Dashboard\Models\Phrase_model;
use App\Modules\Dashboard\Models\Dashboard_model;
use App\Modules\Dashboard\Models\SettingModel;
use App\Modules\Dashboard\Models\Currency_model;
class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form', 'url','lang_helper'];
   
	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		 $this->userModel          = new UserModel();
		 $this->auth_model         = new AuthModel(); 
		 $this->permission_model   = new Permission_model();
		 $this->language_model     = new Language_model();
		 $this->phrase_Model       = new Phrase_model();
		 $this->dashboard_model    = new Dashboard_model();
		 $this->currency_model     = new Currency_model();
		 $this->settingmodel       = new SettingModel();
		 $this->session            = \Config\Services::session();

            
	}

}
