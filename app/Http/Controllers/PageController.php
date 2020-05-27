<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;
use App\Http\Resources\Page as PageResource;
use App\Http\Resources\PageCollection;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\PageCollection
     */
    public function index(Request $request)
    {
        $pages = Page::all();

        return new PageCollection($pages);
    }

    /**
     * @param \App\Http\Requests\PageStoreRequest $request
     * @return \App\Http\Resources\Page
     */
    public function store(PageStoreRequest $request)
    {
        $page = Page::create($request->all());

        return new PageResource($page);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Page $page
     * @return \App\Http\Resources\Page
     */
    public function show(Request $request, Page $page)
    {
        return new PageResource($page);
    }

    /**
     * @param \App\Http\Requests\PageUpdateRequest $request
     * @param \App\Page $page
     * @return \App\Http\Resources\Page
     */
    public function update(PageUpdateRequest $request, Page $page)
    {
        $page->update([]);

        return new PageResource($page);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Page $page)
    {
        $page->delete();

        return response()->noContent(200);
    }
}
