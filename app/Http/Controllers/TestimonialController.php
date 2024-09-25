<?php
namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'store' => 'required',
            'text' => 'required',
        ]);

        $filePath = 'images/user.png'; // Default image if none is uploaded

        if ($request->hasFile('image')) {
            $imageOrVideo = $request->file('image')->move(public_path('images'), $request->file('image')->getClientOriginalName());
            $filePath = 'images/' . $request->file('image')->getClientOriginalName();
        }

        Testimonial::create([
            'name' => $request->name,
            'store' => $request->store,
            'text' => $request->text,
            'image' => $filePath,
        ]);

        return redirect()->route('testimonials.index')->with('message', 'Testimonial added successfully.');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
       $request->validate([
            'name' => 'required',
            'store' => 'required',
            'text' => 'required',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $filePath = $testimonial->image; // Keep the current image if none is uploaded

        if ($request->hasFile('image')) {
            $imageOrVideo = $request->file('image')->move(public_path('images'), $request->file('image')->getClientOriginalName());
            $filePath = 'images/' . $request->file('image')->getClientOriginalName();
        }

        $testimonial->update([
            'name' => $request->name,
            'store' => $request->store,
            'text' => $request->text,
            'image' => $filePath,
        ]);

        return redirect()->route('testimonials.index')->with('message', 'Testimonial updated successfully.');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();
        return redirect()->route('testimonials.index')->with('message', 'Testimonial deleted successfully.');
    }
}
