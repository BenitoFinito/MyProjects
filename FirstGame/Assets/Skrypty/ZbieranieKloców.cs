using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class ZbieranieKloców : MonoBehaviour
{
    public spawner Spawner;
    private LicznikKloców licznikP;

    private int klockidozebrania = 7;
    public static bool PlayerWin = false;
    public GameObject winMenuUI;

    public static int reset = 0;
    int martwosc = 0;

    private void Awake()
    {

    }


    void OnTriggerEnter2D(Collider2D col)
    {
        int f = -2;
        spawner Spawner = FindObjectOfType<spawner>();
        Debug.Log("Kloc został zebrany przez " + col.name);
        if (col.gameObject.name == "Postać")
        {
            if (klockidozebrania > licznikP.liczbaPudelek)
            {
                for (int i = 0; i < Spawner.miejscaDlaKlockow.Length; i++)
                {
                    Debug.Log("p");
                    if (this.gameObject.transform.position == Spawner.miejscaDlaKlockow[i].transform.position)
                    {
                        Spawner.tab[i] = -1;
                        Debug.Log(i);
                        f = i;
                        Random.seed.Equals(Time.time);
                    }
                }
                Spawner.Spawn(f);
            }

            licznikP.zebranoPudelko();
            Destroy(this.gameObject);
        }

    }


    void Start()
    {
        licznikP = GameObject.Find("Manager").GetComponent<LicznikKloców>();
        if (licznikP == null)
        {
            Debug.LogError("LicznikKloców nie znaleziony");
        }
    }



    void Update()
    {
        if ((klockidozebrania + 3) == licznikP.liczbaPudelek)
        {
            reset = 1;
            Win();
        }
        if (martwosc == 1)
        {
            reset = 0;
            martwosc = 0;
        }
    }


    public void PlayAgain()
    {
        Time.timeScale = 1f;
        SceneManager.LoadScene(SceneManager.GetActiveScene().buildIndex);
        PlayerWin = false;
        martwosc = 1;
    }

    public void Win()
    {
        winMenuUI.SetActive(true);
        Time.timeScale = 0f;
        PlayerWin = true;
    }

    public void LoadMenu()
    {
        Time.timeScale = 1f;
        SceneManager.LoadScene("Menu");
        martwosc = 1;
    }

    public void ExitGame()
    {
        Time.timeScale = 1f;
        Debug.Log("Exiting game...");
        Application.Quit();
        martwosc = 1;
    }
}