<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\TermService;
use Illuminate\Http\Request;

class TermController extends Controller
{
    /**
     * @var TermService
     */
    protected $termService;

    /**
     * @param TermService $termService
     */
    public function __construct(TermService $termService)
    {
        $this->termService = $termService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listTerm() {
        return $this->termService->showListTerm();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showAddTerm() {
        return $this->termService->showAddTerm();
    }

    /**
     * @param Request $request
     */
    public function handleAddTerm(Request $request) {
        return $this->termService->handleAddTerm($request);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showEditTerm($id, Request $request) {
        return $this->termService->showEditTerm($id);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleEditTerm($id, Request $request) {
        return $this->termService->handleEditTerm($id, $request);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteTerm($id) {
        return $this->termService->deleteTerm($id);
    }
}
