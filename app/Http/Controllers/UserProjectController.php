<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserProjectRequest;
use App\Http\Requests\UpdateUserProjectRequest;
use App\Repositories\UserProjectRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Flash;
use Response;

class UserProjectController extends AppBaseController
{
    /** @var  UserProjectRepository */
    private $userProjectRepository;

    public function __construct(UserProjectRepository $userProjectRepo)
    {
        $this->userProjectRepository = $userProjectRepo;
    }

    /**
     * Display a listing of the UserProject.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $userProjects = $this->userProjectRepository->all();

        return view('user_projects.index')
            ->with('userProjects', $userProjects);
    }

    /**
     * Show the form for creating a new UserProject.
     *
     * @return Response
     */
    public function create()
    {
        $itemUser = User::pluck('name','id');
        $itemProject = Project::pluck('name','id');
        return view('user_projects.create', compact('itemUser','itemProject'));
    }

    /**
     * Store a newly created UserProject in storage.
     *
     * @param CreateUserProjectRequest $request
     *
     * @return Response
     */
    public function store(CreateUserProjectRequest $request)
    {
        $input = $request->all();

        $userProject = $this->userProjectRepository->create($input);

        Flash::success('User Project saved successfully.');

        return redirect(route('userProjects.index'));
    }

    /**
     * Display the specified UserProject.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userProject = $this->userProjectRepository->find($id);

        if (empty($userProject)) {
            Flash::error('User Project not found');

            return redirect(route('userProjects.index'));
        }

        return view('user_projects.show')->with('userProject', $userProject);
    }

    /**
     * Show the form for editing the specified UserProject.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userProject = $this->userProjectRepository->find($id);

        if (empty($userProject)) {
            Flash::error('User Project not found');

            return redirect(route('userProjects.index'));
        }

        $itemUser = User::pluck('name','id');
        $itemProject = Project::pluck('name','id');
        return view('user_projects.edit', compact('userProject','itemUser','itemProject'));
    }

    /**
     * Update the specified UserProject in storage.
     *
     * @param int $id
     * @param UpdateUserProjectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserProjectRequest $request)
    {
        $userProject = $this->userProjectRepository->find($id);

        if (empty($userProject)) {
            Flash::error('User Project not found');

            return redirect(route('userProjects.index'));
        }

        $userProject = $this->userProjectRepository->update($request->all(), $id);

        Flash::success('User Project updated successfully.');

        return redirect(route('userProjects.index'));
    }

    /**
     * Remove the specified UserProject from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userProject = $this->userProjectRepository->find($id);

        if (empty($userProject)) {
            Flash::error('User Project not found');

            return redirect(route('userProjects.index'));
        }

        $this->userProjectRepository->delete($id);

        Flash::success('User Project deleted successfully.');

        return redirect(route('userProjects.index'));
    }
}
