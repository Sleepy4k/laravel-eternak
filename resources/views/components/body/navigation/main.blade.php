{{  
    html()->div()->class("col-lg-12")
        ->child(html()->div()->class("card")
            ->child(html()->div()->class("card-body")
                ->child(html()->div()->class("profile-tab")
                    ->child(html()->div($slot)->class("custom-tab-1")
                )
            )
        )
    )
}}