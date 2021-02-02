<?php

namespace App\Http\Controllers;

use App\Events\FAQPosted;
use App\FAQ;
use App\Http\Requests\StoreFAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class FAQController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only([
            'create', 'store', 'edit', 'destroy', 'restore'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('faqs.index', [
            'faqs' => FAQ::paginate(),
            'meta_title' => __('FAQs'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faqs.create', ['meta_title' => __('Add FAQ')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFAQ $request)
    {
        $validateData = $request->validated();
        $validateData['slug'] = Str::slug($request->title);

        $faq = FAQ::create($validateData);
        event(new FAQPosted($faq));

        $request->session()->flash('status', 'FAQ was created!');

        return redirect()->route('faqs.show', ['faq' => $faq->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = FAQ::findOrFail($id);

        return view('faqs.show', [
            'faq' => $faq,
            'meta_title' => $faq->title,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);

        return view('faqs.edit', [
            'faq' => $faq,
            'meta_title' => __('Update FAQ')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFAQ $request, $id)
    {
        $faq = FAQ::findOrFail($id);

        $validateData = $request->validated();

        $faq->fill($validateData);

        $faq->save();
        $request->session()->flash('status', __('FAQ was updeted'));

        return redirect()->route('faqs.show', ['faq' => $faq->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $faq = FAQ::findOrFail($id);

        $faq->delete();

        $request->session()->flash('status', __('FAQ was deleted!'));
        return redirect()->route('faqs.index');
    }

    public function restore(Request $request, $id)
    {
        $faq = FAQ::findOrFail($id);

        $faq->restore();

        $request->session()->flash('status', __('FAQ was restored!'));

        return redirect()->route('faqs.index');
    }
}
