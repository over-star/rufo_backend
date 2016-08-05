<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTagsAPIRequest;
use App\Http\Requests\API\UpdateTagsAPIRequest;
use App\Models\Tags;
use App\Repositories\TagsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TagsController
 * @package App\Http\Controllers\API
 */

class TagsAPIController extends InfyOmBaseController
{
    /** @var  TagsRepository */
    private $tagsRepository;

    public function __construct(TagsRepository $tagsRepo)
    {
        $this->tagsRepository = $tagsRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tags",
     *      summary="Get a listing of the Tags.",
     *      tags={"Tags"},
     *      description="Get all Tags",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Tags")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->tagsRepository->pushCriteria(new RequestCriteria($request));
        $this->tagsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tags = $this->tagsRepository->all();

        return $this->sendResponse($tags->toArray(), 'Tags retrieved successfully');
    }

    /**
     * @param CreateTagsAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tags",
     *      summary="Store a newly created Tags in storage",
     *      tags={"Tags"},
     *      description="Store Tags",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Tags that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Tags")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Tags"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTagsAPIRequest $request)
    {
        $input = $request->all();

        $tags = $this->tagsRepository->create($input);

        return $this->sendResponse($tags->toArray(), 'Tags saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tags/{id}",
     *      summary="Display the specified Tags",
     *      tags={"Tags"},
     *      description="Get Tags",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Tags",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Tags"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Tags $tags */
        $tags = $this->tagsRepository->find($id);

        if (empty($tags)) {
            return Response::json(ResponseUtil::makeError('Tags not found'), 404);
        }

        return $this->sendResponse($tags->toArray(), 'Tags retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTagsAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tags/{id}",
     *      summary="Update the specified Tags in storage",
     *      tags={"Tags"},
     *      description="Update Tags",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Tags",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Tags that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Tags")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Tags"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTagsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tags $tags */
        $tags = $this->tagsRepository->find($id);

        if (empty($tags)) {
            return Response::json(ResponseUtil::makeError('Tags not found'), 404);
        }

        $tags = $this->tagsRepository->update($input, $id);

        return $this->sendResponse($tags->toArray(), 'Tags updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tags/{id}",
     *      summary="Remove the specified Tags from storage",
     *      tags={"Tags"},
     *      description="Delete Tags",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Tags",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Tags $tags */
        $tags = $this->tagsRepository->find($id);

        if (empty($tags)) {
            return Response::json(ResponseUtil::makeError('Tags not found'), 404);
        }

        $tags->delete();

        return $this->sendResponse($id, 'Tags deleted successfully');
    }
}
