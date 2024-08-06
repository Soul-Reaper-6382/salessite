<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Home_Text;
use App\Models\Home_Text2;
use App\Models\Circle_Text;
use App\Models\Home_Videos;
use App\Models\Home_Images;
use App\Models\Home_Steps;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;


class HomePageController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
   

   public function text_setting_view()
    {
        // Fetch the current text settings from the database
        $textSettings = Home_Text::first();
        $home_text2 = Home_Text2::first();
        $circleTextSettings = Circle_Text::first();

        
        // Pass the settings to the view
        return view('admin.text_setting', compact('textSettings','home_text2','circleTextSettings'));
    }


     public function images_setting_view()
    {
        // Fetch all images from the database
        $images = Home_Images::all();
        
        // Pass the images to the view
        return view('admin.images_setting', compact('images'));
    }

    public function add_image_settings(Request $request)
	{
	    // Validate the incoming request data
	    $request->validate([
	        'image.*' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
	    ]);

	    if ($request->hasFile('image')) {
	        foreach ($request->file('image') as $file) {
	            $path = $file->move(public_path('images'), $file->getClientOriginalName());
	            Home_Images::create(['image' => 'images/' . $file->getClientOriginalName()]);
	        }
	    }

	    // Redirect back with a success message
	    return back()->with('message', 'Images added successfully.');
	}

	public function delete_image_settings($id)
{
    // Find the image by ID and delete it
    $image = Home_Images::find($id);

    if ($image) {
        // Delete the file from the public folder
        if (file_exists(public_path($image->image))) {
            unlink(public_path($image->image));
        }
        
        // Delete the database record
        $image->delete();
    }

    // Redirect back with a success message
    return back()->with('message', 'Image deleted successfully.');
}



   public function steps_setting_view()
    {
        $steps = Home_Steps::all();

        return view('admin.steps_setting', compact('steps'));
    }


     public function delete_step($id)
    {
        $step = Home_Steps::find($id);
        if ($step) {
            $step->delete();
            return back()->with('message', 'Step deleted successfully!');
        }
        return back()->with('message', 'Step not found!');
    }

    public function add_step_settings(Request $request)
    {
        $request->validate([
            'imageorvideo' => 'required|file|mimes:jpeg,png,jpg,gif,svg,mp4,mov,ogg,qt,webm|max:20480',
            'heading' => 'required|string|max:255',
            'text' => 'required|string',
            'buttons' => 'nullable|array',
            'buttons.*.text' => 'required_with:buttons|string|max:255',
            'buttons.*.link' => 'required_with:buttons|url',
            'buttons.*.color' => 'required_with:buttons|string|max:7',
        ]);

            $imageotvideo = $request->file('imageorvideo')->move(public_path('images'), $request->file('imageorvideo')->getClientOriginalName());
            $filePath= 'images/' . $request->file('imageorvideo')->getClientOriginalName();

        Home_Steps::create([
            'file' => $filePath,
            'heading' => $request->heading,
            'text' => $request->text,
            'buttons' => $request->buttons,
        ]);

        return back()->with('message', 'Step setting added successfully!');
    }

    public function videos_setting_view()
    {
        // Fetch the current video settings from the database
        $videoSettings = Home_Videos::first();
        
        // Pass the settings to the view
        return view('admin.videos_setting', compact('videoSettings'));
    }

    

    public function update_video_settings(Request $request)
    {
    	// dd($request);
        // Validate the incoming request data
          $request->validate([
            'video_one' => 'nullable|mimes:mp4,mov,ogg,qt,webm|max:10240',
            'video_two' => 'nullable|mimes:mp4,mov,ogg,qt,webm|max:10240',
        ]);
        // Fetch the first (or create a new) Home_Videos instance
        $videoSettings = Home_Videos::firstOrNew();

        // Handle video one upload
        if ($request->hasFile('video_one')) {
            $videoOnePath = $request->file('video_one')->move(public_path('videos'), $request->file('video_one')->getClientOriginalName());
            $videoSettings->video_one = 'videos/' . $request->file('video_one')->getClientOriginalName();
        }

        // Handle video two upload
        if ($request->hasFile('video_two')) {
            $videoTwoPath = $request->file('video_two')->move(public_path('videos'), $request->file('video_two')->getClientOriginalName());
            $videoSettings->video_two = 'videos/' . $request->file('video_two')->getClientOriginalName();
        }

        // Save the updated settings to the database
        $videoSettings->save();

        // Redirect back with a success message
        return back()->with('message', 'Video settings updated successfully.');
    }

    public function update_text_settings(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'heading_one' => 'required|string',
            'heading_two' => 'required|string',
            'text' => 'required|string',
        ]);

        // Fetch the first (or create a new) Home_Text instance
        $textSettings = Home_Text::firstOrNew();

        // Update the text settings
        $textSettings->heading_one = $request->input('heading_one');
        $textSettings->heading_two = $request->input('heading_two');
        $textSettings->text = $request->input('text');
        
        // Save the updated settings to the database
        $textSettings->save();

        // Redirect back with a success message
        return back()->with('message', 'Text settings updated successfully.');
    }

    public function update_home_text2(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'heading_one' => 'required|string',
            'text' => 'required|string',
        ]);

        // Fetch the first (or create a new) Home_Text2 instance
        $textSettings = Home_Text2::firstOrNew();

        // Update the text settings
        $textSettings->heading_one = $request->input('heading_one');
        $textSettings->text = $request->input('text');
        
        // Save the updated settings to the database
        $textSettings->save();

        // Redirect back with a success message
        return back()->with('message', 'Text settings updated successfully.');
    }

        public function update_circle_text_settings(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'heading_one' => 'required|string|max:255',
            'text' => 'required|string',
            'cir1' => 'required|string',
            'cir2' => 'required|string',
            'cir3' => 'required|string',
            'cir4' => 'required|string',
            'cir5' => 'required|string',
            'cir6' => 'required|string',
            'cir7' => 'required|string',
            'cir8' => 'required|string',
            'cir9' => 'required|string',
            'cir10' => 'required|string',
        ]);

        // Fetch the first (or create a new) Circle_Text instance
        $circleTextSettings = Circle_Text::firstOrNew();

        // Update the circle text settings
        $circleTextSettings->heading_one = $request->input('heading_one');
        $circleTextSettings->text = $request->input('text');
        $circleTextSettings->cir1 = $request->input('cir1');
        $circleTextSettings->cir2 = $request->input('cir2');
        $circleTextSettings->cir3 = $request->input('cir3');
        $circleTextSettings->cir4 = $request->input('cir4');
        $circleTextSettings->cir5 = $request->input('cir5');
        $circleTextSettings->cir6 = $request->input('cir6');
        $circleTextSettings->cir7 = $request->input('cir7');
        $circleTextSettings->cir8 = $request->input('cir8');
        $circleTextSettings->cir9 = $request->input('cir9');
        $circleTextSettings->cir10 = $request->input('cir10');
        
        // Save the updated settings to the database
        $circleTextSettings->save();

        // Redirect back with a success message
        return back()->with('message', 'Circle text settings updated successfully.');
    }


}
