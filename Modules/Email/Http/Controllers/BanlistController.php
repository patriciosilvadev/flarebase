<?php

namespace Modules\Email\Http\Controllers;

// controller
use App\Http\Controllers\Controller;
// request
use Modules\Core\Requests\BanlistRequest;
use Modules\Core\Requests\BanRequest;
// model
use Modules\Email\Models\Banlist;
use Modules\Core\Models\User;
//classes
use Exception;

/**
 * BanlistController
 * In this controller in the CRUD function for all the banned emails.
 *
 * @author      Ladybird <info@ladybirdweb.com>
 */
class BanlistController extends Controller
{
    /**
     * Create a new controller instance.
     * constructor to check
     * 1. authentication
     * 2. user roles
     * 3. roles must be agent.
     *
     * @return void
     */
    public function __construct()
    {
        // checking authentication
        //$this->middleware('auth');
        // checking admin roles
        //$this->middleware('roles');
    }

    /**
     * Display a listing of all the banned users.
     *
     * @return type
     */
    public function index()
    {
        //try {
            $bans = User::where('isbanned', '=', 1)->get();
            return view('core::banlist.index', compact('bans'));
        //} catch (Exception $e) {
        //    return view('errors.404');
        //}
    }

    /**
     * Show the form for creating a banned user.
     *
     * @return type Response
     */
    public function create()
    {
        try {
            return view('core::emails.banlist.create');
        } catch (Exception $e) {
            return view('errors.404');
        }
    }

    /**
     * Store a new banned user credentials.
     *
     * @param BanRequest $request
     * @param User       $user
     *
     * @return type Response
     */
    public function store(BanRequest $request, User $user)
    {
        // dd($request);
        try {
            //adding field to user whether it is banned or not
            $adban = $request->input('email');
            $use = $user->where('email', $adban)->first();
            if ($use != null) {
                $use->ban = $request->input('ban');
                $use->internal_note = $request->input('internal_note');
                $use->save();
                // $user->create($request->input())->save();
                return redirect('banlist')->with('success', 'Email Banned sucessfully');
            } else {
                $user = new User();
                $user->email = $adban;
                $user->ban = $request->input('ban');
                $user->internal_note = $request->input('internal_note');
                $user->save();

                return redirect('banlist')->with('success', 'Email Banned sucessfully');
            }
        } catch (Exception $e) {
            return redirect('banlist')->with('fails', 'Email can not Ban');
        }
    }

    /**
     * Editing the details of the banned users.
     *
     * @param type $id
     * @param User $ban
     *
     * @return type Response
     */
    public function edit($id, User $ban)
    {
        try {
            $bans = $ban->whereId($id)->first();

            return view('core::emails.banlist.edit', compact('bans'));
        } catch (Exception $e) {
            return view('errors.404');
        }
    }

    /**
     * Update the banned users.
     *
     * @param type           $id
     * @param User           $ban
     * @param BanlistRequest $request
     *
     * @return type Response
     */
    public function update($id, User $ban, BanlistRequest $request)
    {
        try {
            $bans = $ban->whereId($id)->first();
            $bans->internal_note = $request->input('internal_note');
            $bans->ban = $request->input('ban');
            if ($bans->save()) {
                return redirect('banlist')->with('success', 'Banned Email Updated sucessfully');
            } else {
                return redirect('banlist')->with('fails', 'Banned Email not Updated');
            }
        } catch (Exception $e) {
            return redirect('banlist')->with('fails', 'Banned Email not Updated');
        }
    }
}
