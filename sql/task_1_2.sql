select contact_id, count(friend_id) as c
from friends
group by contact_id
having count(friend_id) > 5
order by contact_id;
