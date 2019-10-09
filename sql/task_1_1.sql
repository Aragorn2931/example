select contact_id, friend_id from friends as f
where exists(select id from friends where friends.friend_id = f.contact_id)
and contact_id < friend_id
order by contact_id;
