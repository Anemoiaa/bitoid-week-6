<?php

namespace Drupal\devjobs\Controller;


use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\taxonomy\Entity\Term;
use Drupal\Core\Routing;



class JobsController extends ControllerBase {

    public function content() {

        $title = \Drupal::request()->query->get('title');
        $location = \Drupal::request()->query->get('location');
        $time = \Drupal::request()->query->get('time');

        $vacancies = [];


        $query = \Drupal::entityQuery('node');
        $query->condition('type', 'Vacancy');

        if($title)
            $query->condition('title', $title, 'CONTAINS');
        if($location)
            $query->condition('field_location', $location, 'CONTAINS');
        if($time)
            $query->condition('field_work_time', "1"); // '1' is 'Full Time' term id

        $nids = $query->execute();

        
        foreach ($nids as $nid){
            $node = Node::load($nid);
            $tid = $node->field_work_time->getValue()[0]['target_id']; //work time term id
            $date = $node->getCreatedTime(); // published date in seconds

            $title = $node->getTitle();
            $company_name = $node->field_company_name->getValue()[0]['value'];
            $location = $node->field_location->getValue()[0]['value'];
            $work_time = Term::load($tid)->getName();
            $published_date = \Drupal::service('date.formatter')->format($date, 'D, m-d-Y');
            $image_url = file_create_url($node->field_company_logo->entity->getFileUri());
            
            $vacancies[$nid] = [
                'nid' => $nid,
                'title' => $title,
                'company_name' => $company_name,
                'location' => $location,
                'work_time'    => $work_time,
                'published_date' => $published_date,
                'image_url' => $image_url,
            ];
        }

        return [
            '#theme' => 'vacancies_theme', 
            '#vacancies' => $vacancies
        ];
    }
}