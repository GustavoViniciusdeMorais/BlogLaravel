<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;
use Session;
use App\Post;

class PagesController extends Controller {

	public function getIndex(){
		# process variables data and parameters
		# talk to the model
		# receive data back from the model
		# compile or process data again if needed
		# pass that dat to the correct view
		$posts = Post::orderBy('id', 'desc')->limit(4)->get();
		return view('pages.welcome')->withPosts($posts);
	}

	public function getAbout(){
		$first = 'Gustavo';
		$last = 'Vinicius';

		$full = $first . " " . $last;
		$email = 'gustavo@gmail.com';
		$data = [];
		$data['email'] = $email;
		$data['name'] = $full;

		#return view('pages.about')->withFullname($full);
		return view('pages.about')->withData($data);
	}

	public function getContact(){
		return view('pages.contact');
	}

	public function sendFeedback(Request $request)
	{
		//dd($request);
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'text' => 'min:10'
		]);

		//$comment = 'Eu escrevi a mensagem aqui!.';
		$feedback = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'text' => $request->text
		);
		//$comment = $request->text;
		//$from = $request->subject;
		//$subject = $request->subject;
		$toEmail = "gustavoviniciusmoraisti@gmail.com";
		Mail::to($toEmail)->send(new FeedbackMail($feedback));

		Session::flash('success', 'Email enviado!');
   		//return view('pages.contact');
   		return redirect('/');
	}

}
