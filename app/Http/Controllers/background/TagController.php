<?php

namespace App\Http\Controllers\Background;

use App\Http\Requests\Background;
use App\Http\Requests\Background\CreateTagRequest;
use App\Http\Requests\Background\UpdateTagRequest;
use App\Repositories\Background\TagRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Http\Controllers\Controller as LaravelController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TagController extends InfyOmBaseController
{
    /** @var  TagRepository */
    private $tagRepository;

    public function __construct(TagRepository $tagRepo)
    {
        $this->tagRepository = $tagRepo;
    }

    /**
     * Display a listing of the Tag.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tagRepository->pushCriteria(new RequestCriteria($request));
        $tags = $this->tagRepository->all();

        return view('background.tags.index')
            ->with('tags', $tags);
    }

    /**
     * Show the form for creating a new Tag.
     *
     * @return Response
     */
    public function create()
    {
        return view('background.tags.create');
    }

    /**
     * Store a newly created Tag in storage.
     *
     * @param CreateTagRequest $request
     *
     * @return Response
     */
    public function store(CreateTagRequest $request)
    {
        $input = $request->all();

        $tag = $this->tagRepository->create($input);

        Flash::success('Tag saved successfully.');

        return redirect(route('background.tags.index'));
    }

    /**
     * Display the specified Tag.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tag = $this->tagRepository->findWithoutFail($id);

        if (empty($tag)) {
            Flash::error('Tag not found');

            return redirect(route('background.tags.index'));
        }

        return view('background.tags.show')->with('tag', $tag);
    }

    /**
     * Show the form for editing the specified Tag.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tag = $this->tagRepository->findWithoutFail($id);

        if (empty($tag)) {
            Flash::error('Tag not found');

            return redirect(route('background.tags.index'));
        }

        return view('background.tags.edit')->with('tag', $tag);
    }

    /**
     * Update the specified Tag in storage.
     *
     * @param  int              $id
     * @param UpdateTagRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTagRequest $request)
    {
        $tag = $this->tagRepository->findWithoutFail($id);

        if (empty($tag)) {
            Flash::error('Tag not found');

            return redirect(route('background.tags.index'));
        }

        $tag = $this->tagRepository->update($request->all(), $id);

        Flash::success('Tag updated successfully.');

        return redirect(route('background.tags.index'));
    }

    /**
     * Remove the specified Tag from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tag = $this->tagRepository->findWithoutFail($id);

        if (empty($tag)) {
            Flash::error('Tag not found');

            return redirect(route('background.tags.index'));
        }

        $this->tagRepository->delete($id);

        Flash::success('Tag deleted successfully.');

        return redirect(route('background.tags.index'));
    }
}
