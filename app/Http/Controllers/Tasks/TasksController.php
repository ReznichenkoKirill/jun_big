<?php
    namespace App\Http\Controllers\Tasks;
    use App\Models\Task;
    use Illuminate\Http\Request;
    use App\Http\Requests;
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\Controller;

    class TasksController extends Controller
    {
        public function __construct()
        {
            $this->middleware('auth'); // посредник
        }
        public function index(Request $request)
        {
            $user = $request->user();   // выбирает павторизированного узера
            $tasks = $user->tasks;      // выборка tasks именно этого юзера

//            dd($this->getLanguages());

            return view('tasks.index',
                        ['tasks'=>$tasks, 'languages'=>$this->getLanguages(), 'currentLanguages'=>$this->getCurrentLanguage(),]
            );
        }
        public function create()
        {
            return view('tasks.create', ['languages'=>$this->getLanguages(),'currentLanguages'=>$this->getCurrentLanguage()]);
        }
        public function add(Request $request)
        {
            $this->validate($request, ['name' => 'required|max:255']);
            ###v1###############
//            $user = Auth::user();
//            dd($user);
            ####################
            ###v2###############
            $user = $request->user();
//            dd($user->tasks); // получение всех задач
//            dd($user->tasks()); // получаем класс HasMany
            $user->tasks()->create(
                    ['name'=>$request->name,]
            );
            ####################
//            $task = new Task();
//            $task->name = $request->name;
//            $task->user_id = $user->id;
//            $task->save();
            return redirect(route('tasks.index'));
        }
        
        public function delete(Task $task) {
            $task->delete();
            return redirect(route('tasks.index'));
        }

        public function choiseLanguage($lang) {
            App::setLocale($lang);
            return redirect(route('tasks.index'));
        }

        public function getCurrentLanguage() {
            return App::getLocale();
        }

        private function getLanguages() {
            $dir = '../resources/lang';
            $languages = scandir($dir);
            foreach ($languages as $lang) {
                if(stristr($lang, '.')){
                    array_shift($languages);
                }
            }
            return $languages;
        }
    }
