using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class Movement : MonoBehaviour
{
    public bool naPlatformie = true;
    private Rigidbody2D rbBody;
    public bool kierunekWPrawo = true;
   
    private Animator anim;
    public Transform testerPolozeniaPostaci;
    public LayerMask maskaWarstwyDoTestowania;

    public float predkosc = 10;
    public float silaSkoku = 500;

    private Vector3 respawnPoint;
    public GameObject fallDetector;
    
    void Start()
    {
        rbBody = GetComponent<Rigidbody2D>();
        anim = GetComponent<Animator>();
        respawnPoint = transform.position;
    }

    
    void Update()
    {
        float ruchPoziomy = Input.GetAxis("Horizontal");
        float ruchPionowy = Input.GetAxis("Vertical");

        rbBody.velocity = new Vector2(ruchPoziomy * predkosc, rbBody.velocity.y);

        
        Vector3 skala = gameObject.transform.localScale; 
                                                         
        if (ruchPoziomy < 0 && kierunekWPrawo == true) 
        {
            Flip();
        }

        if (ruchPoziomy > 0 && kierunekWPrawo == false)
        {
            Flip();
        }

        if (ruchPoziomy < 0 || ruchPoziomy > 0)
        {
            anim.SetInteger("FazaAnimacji", 1);
        }

        else
        {
            anim.SetInteger("FazaAnimacji", 0);
        }

        naPlatformie = Physics2D.OverlapCircle((Vector2)testerPolozeniaPostaci.position, 0.1f, maskaWarstwyDoTestowania);

        if (Input.GetKeyDown(KeyCode.Space) & naPlatformie == true)
        {
            rbBody.AddForce(new Vector2(0f, silaSkoku));
        }
        if (naPlatformie == true)
        {
            anim.SetBool("Na platformie", true);
            anim.SetBool("W powietrzu", false);
        }
        else
        {
            anim.SetBool("Na platformie", false);
            anim.SetBool("W powietrzu", true);
        }

        fallDetector.transform.position = new Vector2(transform.position.x, fallDetector.transform.position.y);
    }

    private void OnTriggerEnter2D(Collider2D collision)
    {
        if(collision.tag == "FallDetector")
        {
            SceneManager.LoadScene(SceneManager.GetActiveScene().buildIndex);
        }
    }

    void Flip()
    {
        kierunekWPrawo = !kierunekWPrawo; 
        Vector3 skala = gameObject.transform.localScale; 
        skala.x *= -1; 
        gameObject.transform.localScale = skala; 
    }

}
