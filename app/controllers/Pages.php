<?php
class Pages extends Controller
{
    public function __construct()
    {
        $this->categoryModel = $this->model('Category');
        $this->petitionModel = $this->model('Petition');
        $this->eventModel = $this->model('Event');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $event = $this->eventModel->topEvents();
        $victory = $this->petitionModel->victory();

        $data = [
            'event_output' => '',
            'petition_output' => '',
            'victory_output' => '',
        ];
        //Top Events View

        $events = "";

        for ($x = 0; $x < 5; $x++) {
            // card start
            $event_start = "<div class='blog-card-vertical'><div class='meta'>";
            // image
            $image = "<div class='photo' style='background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)'></div>";
            // author details
            $user = $this->userModel->getUserById($event[$x]->usr_id);
            // date
            $date = $event[$x]->date;
            // detail list start + end
            $details = "<ul class='details'><li class='author'><a href='#'>" . $user->name . "</a></li><li class='date'>" . $date . "</li></ul></div>";
            // title
            $title = "<div class='description'><h1>" . $event[$x]->event_title . "</h1>";
            // venue
            $venue = "<h2><strong>Venue: </strong> " . $event[$x]->venue . "</h2>";
            // description
            $description = substr($event[$x]->details, 0, 175);
            $desc = "<p>" . $description . "...</p>";
            // Read more
            $link = "<p class='read-more'><a href='" . URLROOT . "/events/show/" . $event[$x]->event_id . "'>Read More</a></p>";
            // end
            $end = "</div></div>";
            $events .= $event_start . $image . $details . $title . $venue . $desc . $link . $end;
        }
        $data['event_output'] = $events;

        // Victory output

        $slider = "";

        for ($x = 0; $x < 5; $x++) {
            // card start
            $victory_start = "<div><div class='blog-card-slider'><div class='meta'><div class='ribbon ribbon-victory'>victory</div>";
            // image
            $image = "<div class='photo' style='background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)'></div>";
            // author details
            $user = $this->userModel->getUserById($victory[$x]->usr_id);
            // date
            $date = $victory[$x]->target_date;
            // votes
            $votes = $victory[$x]->total_votes . " / " . $victory[$x]->target_votes;
            // detail list start + end
            $details = "<ul class='details'><li class='author'>" . $user->name . "</li><li class='date'>" . $date . "</li></ul></div>";
            // title
            $title = "<div class='description'><h1>" . $victory[$x]->title . "</h1>";
            // voters
            $voters = "<h2><strong>Votes: </strong> " . $votes . "</h2>";
            // description
            $description = substr($victory[$x]->description, 0, 175);
            $desc = "<p>" . $description . "...</p>";
            // Read more
            $link = "<p class='read-more'><a href='" . URLROOT . "/petitions/show/" . $victory[$x]->petition_id . "'>Read More</a></p>";
            // end
            $end = "</div></div></div>";
            $slider .= $victory_start . $image . $details . $title . $voters . $desc . $link . $end;

        }
        $data['victory_output'] = $slider;

        // Petitions output

        $petitions = "";

        for ($x = 1; $x < 11; $x++) {
            $petition = $this->petitionModel->getPetitionByCategoryId($x);
            // echo '<pre>';
            // print_r($petition);
            // die();
            // category heading
            $category = $this->categoryModel->getCategoryById($petition->category_id);
            $category_name = $category->title;
            $heading = "<h1>Latest Petition in ".$category_name."</h1>";
            // card start
            $petitions_start = "<div><div class='blog-card-slider'><div class='meta'>";
            // image
            $image = "<div class='photo' style='background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)'></div>";
            // author details
            $user = $this->userModel->getUserById($petition->usr_id);
            // date
            $date = $petition->target_date;
            // votes
            $votes = $petition->total_votes . " / " . $petition->target_votes;
            // detail list start + end
            $details = "<ul class='details'><li class='author'>" . $user->name . "</li><li class='date'>" . $date . "</li></ul></div>";
            // title
            $title = "<div class='description'><h1>" . $petition->title . "</h1>";
            // voters
            $voters = "<h2><strong>Votes: </strong> " . $votes . "</h2>";
            // description
            $description = substr($petition->description, 0, 175);
            $desc = "<p>" . $description . "...</p>";
            // Read more
            $link = "<p class='read-more'><a href='" . URLROOT . "/petitions/show/" . $petition->petition_id . "'>Read More</a></p>";
            // end
            $end = "</div></div></div>";
            $petitions .= $heading.$petitions_start . $image . $details . $title . $voters . $desc . $link . $end;

        }
        
        $data['petition_output'] = $petitions;

        $this->view('pages/index', $data);

    }
    public function about()
    {
        $this->view('pages/about');
    }

}
