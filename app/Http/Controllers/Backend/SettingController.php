<?php

namespace App\Http\Controllers\Backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SociliteUpdateRequest;
use App\Http\Requests\ApperanceUpdateRequest;
use App\Http\Requests\MailSettingUpdateRequest;
use App\Http\Requests\GeneralSettingUpdateRequest;

class SettingController extends Controller
{
    public function general()
    {
        Gate::authorize('general-setting-view');
        return view('admin.pages.settings.general');
    }

    public function generalUpdate(GeneralSettingUpdateRequest $request)
    {
        Gate::authorize('general-setting-update');
        Setting::updateOrCreate(
            ['name' => 'site_title'],
            ['value' => $request->site_title],
        );
        Setting::updateOrCreate(
            ['name' => 'site_address'],
            ['value' => $request->site_address],
        );
        Setting::updateOrCreate(
            ['name' => 'site_phone'],
            ['value' => $request->site_phone],
        );
        Setting::updateOrCreate(
            ['name' => 'site_facebook_link'],
            ['value' => $request->site_facebook_link],
        );
        Setting::updateOrCreate(
            ['name' => 'site_twitter_link'],
            ['value' => $request->site_twitter_link],
        );
        Setting::updateOrCreate(
            ['name' => 'site_instagram_link'],
            ['value' => $request->site_instagram_link],
        );
        Setting::updateOrCreate(
            ['name' => 'site_description'],
            ['value' => $request->site_description],
        );


        Toastr::success('Setting Updated Successfully!!!');
        return back();
    }


    public function apperance()
    {
        Gate::authorize('appearance-setting-view');
        return view('admin.pages.settings.apperance');
    }

    public function apperanceUpdate(ApperanceUpdateRequest $request)
    {
        Gate::authorize('appearance-setting-update');
        Setting::updateOrCreate(
            ['name' => 'bg_color'],
            ['value' => $request->bg_color],
        );

        if($request->hasFile('logo_image')){
            if(setting('logo_image') !=null){
                $this->deleteOldFile(setting('logo_image'));
            }
            Setting::updateOrCreate(
                ['name' => 'logo_image'],
                ['value' => Storage::putFileAs('public', $request->file('logo_image'), 'logo_image.jpg')]
            );
        }
        if($request->hasFile('favicon_image')){
            if(setting('favicon_image') !=null){
                $this->deleteOldFile(setting('favicon_image'));
            }
            Setting::updateOrCreate(
                ['name' => 'favicon_image'],
                ['value' => Storage::putFileAs('public', $request->file('favicon_image'), 'favicon_image.jpg')]
            );
        }

        Toastr::success('Setting Updated Successfully!!!');
        return back();
    }

    private function deleteOldFile($path){
        Storage::disk('public')->delete($path);
    }


    public function mailView()
    {
        Gate::authorize('mail-setting-view');
        return view('admin.pages.settings.mail');
    }

    public function mailUpdate(MailSettingUpdateRequest $request)
    {
        Gate::authorize('mail-setting-update');
        Setting::updateOrCreate(
            ['name' => 'mail_mailer'],
            ['value' => $request->mail_mailer],
        );
        Setting::updateOrCreate(
            ['name' => 'mail_host'],
            ['value' => $request->mail_host],
        );
        Setting::updateOrCreate(
            ['name' => 'mail_port'],
            ['value' => $request->mail_port],
        );
        Setting::updateOrCreate(
            ['name' => 'mail_username'],
            ['value' => $request->mail_username],
        );
        Setting::updateOrCreate(
            ['name' => 'mail_password'],
            ['value' => $request->mail_password],
        );
        Setting::updateOrCreate(
            ['name' => 'mail_encryption'],
            ['value' => $request->mail_encryption],
        );
        Setting::updateOrCreate(
            ['name' => 'mail_from_address'],
            ['value' => $request->mail_from_address],
        );


        // update ENV file
        $this->setEnvValue('MAIL_MAILER', $request->mail_mailer);
        $this->setEnvValue('MAIL_HOST', $request->mail_host);
        $this->setEnvValue('MAIL_PORT', $request->mail_port);
        $this->setEnvValue('MAIL_USERNAME', $request->mail_username);
        $this->setEnvValue('MAIL_PASSWORD', $request->mail_password);
        $this->setEnvValue('MAIL_ENCRYPTION', $request->mail_encryption);
        $this->setEnvValue('MAIL_FROM_ADDRESS', $request->mail_from_address);

        Toastr::success('Setting Updated Successfully!!!');
        return back();
    }

    
    public function socialiteView()
    {
        Gate::authorize('socialite-setting-view');
        return view('admin.pages.settings.socialite');
    }
    public function socialiteUpdate(SociliteUpdateRequest $request)
    {
        Gate::authorize('socialite-setting-update');
        Setting::updateOrCreate(
            ['name' => 'git_client_id'],
            ['value' => $request->git_client_id],
        );
        Setting::updateOrCreate(
            ['name' => 'git_client_secret'],
            ['value' => $request->git_client_secret],
        );
        Setting::updateOrCreate(
            ['name' => 'git_client_redirect'],
            ['value' => $request->git_client_redirect],
        );
        Setting::updateOrCreate(
            ['name' => 'google_client_id'],
            ['value' => $request->google_client_id],
        );
        Setting::updateOrCreate(
            ['name' => 'google_client_secret'],
            ['value' => $request->google_client_secret],
        );
        Setting::updateOrCreate(
            ['name' => 'google_client_redirect'],
            ['value' => $request->google_client_redirect],
        );

        // update env
        $this->setEnvValue('GITHUB_CLIENT_ID', $request->git_client_id);
        $this->setEnvValue('GITHUB_CLIENT_SECRET', $request->git_client_secret);
        $this->setEnvValue('GITHUB_CLIENT_REDIRECT', $request->git_client_redirect);
        $this->setEnvValue('GOOGLE_CLIENT_ID', $request->google_client_id);
        $this->setEnvValue('GOOGLE_CLIENT_SECRET', $request->google_client_secret);
        $this->setEnvValue('GOOGLE_CLIENT_REDIRECT', $request->google_client_redirect);

        Toastr::success('Setting Updated Successfully!!!');
        return back();
    }


    /**
 * @param string $key
 * @param string $value
 */
    protected function setEnvValue(string $key, string $value)
    {
        $path = app()->environmentFilePath();
        $env = file_get_contents($path);

        $old_value = env($key);

        if (!str_contains($env, $key.'=')) {
            $env .= sprintf("%s=%s\n", $key, $value);
        } else if ($old_value) {
            $env = str_replace(sprintf('%s=%s', $key, $old_value), sprintf('%s=%s', $key, $value), $env);
        } else {
            $env = str_replace(sprintf('%s=', $key), sprintf('%s=%s',$key, $value), $env);
        }

        file_put_contents($path, $env);
    }


}
