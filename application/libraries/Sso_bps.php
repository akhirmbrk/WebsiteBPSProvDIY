<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Sso_bps
{

	function load()
	{
		include_once APPPATH . '/third_party/ckponline/vendor/autoload.php';
		//require 'vendor/autoload.php';

		//session_start();

		$provider = new JKD\SSO\Client\Provider\Keycloak([
			'authServerUrl'             => 'https://sso.bps.go.id',
			'realm'                     => 'pegawai-bps',
			'clientId'                  => '13400-ckponline-d1y',
			'clientSecret'              => '960a62b0-a1f1-4248-87c3-9611678d2bdb',
			'redirectUri'               => 'http://localhost/zoom/index.php/sso/index/',
			'encryptionAlgorithm'       => null,
			'encryptionKey'             => null,
			'encryptionKeyPath'         => null
		]);

		if (!isset($_GET['code'])) {
			// If we don't have an authorization code then get one
			$authUrl = $provider->getAuthorizationUrl();
			$_SESSION['oauth2state'] = $provider->getState();
			header('Location: ' . $authUrl);
			exit;

			// Check given state against previously stored one to mitigate CSRF attack
		} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
			unset($_SESSION['oauth2state']);
			exit('Invalid state, make sure HTTP sessions are enabled.');
		} else {
			// Try to get an access token (using the authorization coe grant)
			try {
				$token = $provider->getAccessToken('authorization_code', [
					'code' => $_GET['code']
				]);
			} catch (Exception $e) {
				exit('Failed to get access token: ' . $e->getMessage());
			}

			// Optional: Now you have a token you can look up a users profile data
			try {

				// We got an access token, let's now get the user's details
				$user = $provider->getResourceOwner($token);

				//echo "NIP : ". $user->getNip();



			} catch (Exception $e) {
				exit('Failed to get resource owner: ' . $e->getMessage());
			}

			// Use this to interact with an API on the users behalf
			//echo $token->getToken();

			//header("Location: http://localhost/3400_portal/index.php/home/sesssion_on_portal/".$user->getNip());
			//return $user->getName();


			$arry['nama'] = $user->getName();
			$arry['nip'] = $user->getNip();
			$arry['getprop'] = $user->getKodeProvinsi();
			$arry['kodeKabKota'] = $user->getKabupaten();

			//$arry['getUrlFoto'] = $user->getUrlFoto();
			//$arry['jabatan'] = $user->getJabatan();


			/*
			echo "Nama : ".$user->getName();
            echo "E-Mail : ". $user->getEmail();
            echo "Username : ". $user->getUsername();
            echo "NIP : ". $user->getNip();
            echo "NIP Baru : ". $user->getNipBaru();
            echo "Kode Organisasi : ". $user->getKodeOrganisasi();
            echo "Kode Provinsi : ". $user->getKodeProvinsi();
            echo "Kode Kabupaten : ". $user->getKodeKabupaten();
            echo "Alamat Kantor : ". $user->getAlamatKantor();
            echo "Provinsi : ". $user->getProvinsi();
            echo "Kabupaten : ". $user->getKabupaten();
            echo "Golongan : ". $user->getGolongan();
            echo "Jabatan : ". $user->getJabatan();
            echo "Foto : ". $user->getUrlFoto();
            echo "Eselon : ". $user->getEselon();
			*/
			//$arry['foto'] = $user->getUrlFoto();



			return $arry;
		}
	}




	function lout()
	{
		include_once APPPATH . '/third_party/ckponline/vendor/autoload.php';


		$provider = new JKD\SSO\Client\Provider\Keycloak([
			'authServerUrl'             => 'https://sso.bps.go.id',
			'realm'                     => 'pegawai-bps',
			'clientId'                  => '13400-ckponline-d1y',
			'clientSecret'              => '960a62b0-a1f1-4248-87c3-9611678d2bdb',
			'redirectUri'               => 'http://localhost/zoom/index.php/sso/index/',
			'encryptionAlgorithm'       => null,
			'encryptionKey'             => null,
			'encryptionKeyPath'         => null
		]);

		$url_logout = $provider->getLogoutUrl();
		//echo $url_logout;
		header('Location: ' . $url_logout);
	}
}
